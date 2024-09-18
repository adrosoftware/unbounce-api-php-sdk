<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Endpoint\Accounts;

use AdroSoftware\UnbounceSdk\Endpoint\AbstractEndpoint;
use AdroSoftware\UnbounceSdk\Endpoint\EndpointInterface;

final class Accounts extends AbstractEndpoint implements EndpointInterface
{
    public function get(): mixed
    {
        return $this->factorResponse(
            $this->unbounce->getHttpClient()->get('/accounts')
        );
    }

    public function find(int $id): mixed
    {
        return $this->factorResponse(
            $this->unbounce->getHttpClient()->get("/accounts/{$id}?secure=true")
        );
    }
}
