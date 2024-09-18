<?php

namespace AdroSoftware\UnbounceSdk\Http\Message;

use Psr\Http\Message\ResponseInterface;

interface ResponseTransformerInterface
{
    public function transform(ResponseInterface $response): ?array;
}
