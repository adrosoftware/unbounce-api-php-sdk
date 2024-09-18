<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk;

use AdroSoftware\UnbounceSdk\Contracts\InteractsWithEndpoints;
use AdroSoftware\UnbounceSdk\Endpoint\{
    Accounts\Accounts,
    Pages\Pages,
};

final class Unbounce extends AbstractClient implements InteractsWithEndpoints
{
    public static function make(
        string $token,
        ?Options $options = null,
    ): static {
        return new static($token, $options);
    }

    public function accounts(): Accounts
    {
        return new Accounts($this);
    }

    public function pages(): Pages
    {
        return new Pages($this);
    }
}
