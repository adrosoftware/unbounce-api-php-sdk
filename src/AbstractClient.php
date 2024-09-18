<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk;

use AdroSoftware\UnbounceSdk\Exception\{
    RequestUnauthorizedException,
    ResourceNotFoundException,
    UnsuccessfulResponseException
};
use AdroSoftware\UnbounceSdk\Http\Message\ArrayTransformer;
use AdroSoftware\UnbounceSdk\Http\Message\ResponseTransformerInterface;
use AdroSoftware\UnbounceSdk\Response\FactoryInterface;
use AdroSoftware\UnbounceSdk\Response\Status;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractClient
{
    protected ClientBuilder $clientBuilder;

    protected FactoryInterface $responseFactory;

    protected ResponseTransformerInterface $responseTransformer;

    public function __construct(
        protected string $token,
        protected ?Options $options = null,
    ) {
        $this->options = $options ?? new Options();

        $this->responseTransformer = new ArrayTransformer();
        $this->responseFactory = $this->options->getResponseFactory();

        $this->clientBuilder = $this->options->getClientBuilder();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($this->options->getUri()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin([
                'User-Agent' => $this->options->getUserAgent(),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => "Token {$this->token}",
            ])
        );
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    public function getResponseTransformer(): ResponseTransformerInterface
    {
        return $this->responseTransformer;
    }

    public function getResponseFactory(): FactoryInterface
    {
        return $this->responseFactory;
    }

    /**
     * @throws ResourceNotFoundException
     * @throws RequestUnauthorizedException
     * @throws UnsuccessfulResponseException
     */
    public function factorResponse(ResponseInterface $response): mixed
    {
        $this->checkIfRequestWasSuccessful($response);

        $response->getBody()->rewind();

        $response = $this->getResponseTransformer()->transform($response);

        if ($this->getResponseFactory() instanceof FactoryInterface) {
            $response = $this->getResponseFactory()->factor($response);
        }

        return $response;
    }

    /**
     * Check if the request was successful.
     *
     * @throws ResourceNotFoundException
     * @throws RequestUnauthorizedException
     * @throws UnsuccessfulResponseException
     */
    protected function checkIfRequestWasSuccessful(?ResponseInterface $response = null): void
    {
        if (strpos($response->getBody()->getContents(), Status::UNAUTHORIZED) !== false) {
            throw new RequestUnauthorizedException($response->getReasonPhrase(), $response->getStatusCode());
        }

        if ($response->getStatusCode() === 401) {
            throw new RequestUnauthorizedException($response->getReasonPhrase(), $response->getStatusCode());
        }

        if ($response->getStatusCode() === 404) {
            throw new ResourceNotFoundException($response->getReasonPhrase(), $response->getStatusCode());
        }

        if ($response->getStatusCode() >= 400) {
            throw new UnsuccessfulResponseException($response->getReasonPhrase(), $response->getStatusCode());
        }
    }
}
