<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Response;

final class BypassFactory implements FactoryInterface
{
    public function factor(?array $response = null): ?array
    {
        return $response;
    }
}
