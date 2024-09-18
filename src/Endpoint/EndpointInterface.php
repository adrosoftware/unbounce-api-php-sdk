<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Endpoint;

use AdroSoftware\UnbounceSdk\Unbounce;

interface EndpointInterface
{
    public function __construct(Unbounce $unbounce);
}
