<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Contracts;

use AdroSoftware\UnbounceSdk\Endpoint\{
    Accounts\Accounts,
};

interface InteractsWithEndpoints
{
    public function accounts(): Accounts;
}
