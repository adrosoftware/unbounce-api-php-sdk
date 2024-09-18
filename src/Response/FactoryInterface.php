<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Response;

interface FactoryInterface
{
    public function factor(?array $response = null): mixed;
}
