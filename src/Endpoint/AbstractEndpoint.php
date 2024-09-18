<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Endpoint;

use AdroSoftware\UnbounceSdk\Unbounce;
use AdroSoftware\UnbounceSdk\Exception\{
    CommunityIdNotPresentException,
    RequestUnauthorizedException,
    ResourceNotFoundException,
    UnsuccessfulResponseException,
};
use Psr\Http\Message\ResponseInterface;

abstract class AbstractEndpoint
{
    public function __construct(protected Unbounce $unbounce)
    {
    }

    /**
     * @throws ResourceNotFoundException
     * @throws RequestUnauthorizedException
     * @throws UnsuccessfulResponseException
     */
    protected function factorResponse(ResponseInterface $response): mixed
    {
        return $this->unbounce->factorResponse($response);
    }
}
