<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Endpoint\Pages;

use AdroSoftware\UnbounceSdk\Endpoint\AbstractEndpoint;
use AdroSoftware\UnbounceSdk\Endpoint\EndpointInterface;
use DateTime;

final class Pages extends AbstractEndpoint implements EndpointInterface
{
    public function get(
        ?string $sortOrder = null,
        ?bool $onlyCount = null,
        DateTime|string|null $from = null,
        DateTime|string|null $to = null,
        ?int $offset = null,
        ?int $limit = null,
        ?bool $withStats = null,
        ?string $role = null
    ): mixed {
        $query = [
            'secure' => 'true',
            'sort_order' => $sortOrder ?? 'asc',
            'count' => $onlyCount ? 'true' : 'false',
            'from' => $from instanceof DateTime ?
                $from->format('c') :
                (is_string($from) ? (new DateTime($from))->format('c') : null),
            'to' => $to instanceof DateTime ?
                $to->format('c') :
                (is_string($to) ? (new DateTime($to))->format('c') : null),
            'offset' => $offset ?? 0,
            'limit' => $limit > 1000 ? 1000 : $limit ?? 50,
            'with_stats' => $withStats ? 'true' : 'false',
            'role' => $role ?? 'author',
        ];

        return $this->factorResponse(
            $this->unbounce->getHttpClient()->get(
                "/pages?" . http_build_query($query)
            )
        );
    }

    public function find(int $id): mixed
    {
        return $this->factorResponse(
            $this->unbounce->getHttpClient()->get("/pages/{$id}")
        );
    }
}
