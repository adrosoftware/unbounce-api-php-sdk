<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk;

use AdroSoftware\UnbounceSdk\Response\BypassFactory;
use AdroSoftware\UnbounceSdk\Response\FactoryInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Options
{
    public function __construct(private array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    private function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'client_builder' => new ClientBuilder(),
            'uri_factory' => Psr17FactoryDiscovery::findUriFactory(),
            'response_factory' => new BypassFactory(),
            'uri' => 'https://api.unbounce.com/',
            'user_agent' => 'adrosoftware/unbounce-api-php-sdk',
        ]);

        $resolver->setAllowedTypes('uri', 'string');
        $resolver->setAllowedTypes('user_agent', 'string');
        $resolver->setAllowedTypes('client_builder', ClientBuilder::class);
        $resolver->setAllowedTypes('uri_factory', UriFactoryInterface::class);
        $resolver->setAllowedTypes('response_factory', FactoryInterface::class);
    }

    public function getClientBuilder(): ClientBuilder
    {
        return $this->options['client_builder'];
    }

    public function getUriFactory(): UriFactoryInterface
    {
        return $this->options['uri_factory'];
    }

    public function getResponseFactory(): ?FactoryInterface
    {
        return $this->options['response_factory'];
    }

    public function getUri(): UriInterface
    {
        return $this->getUriFactory()
            ->createUri($this->options['uri']);
    }

    public function getUserAgent(): string
    {
        return $this->options['user_agent'];
    }
}
