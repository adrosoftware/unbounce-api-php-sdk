<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Contracts;

use AdroSoftware\UnbounceSdk\Endpoint\{
    Accounts\Accounts,
    Pages\Pages,
};

interface InteractsWithEndpoints
{
    public function accounts(): Accounts;

    public function pages(): Pages;
}
