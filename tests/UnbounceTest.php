<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Tests;

use AdroSoftware\UnbounceSdk\Exception\RequestUnauthorizedException;
use AdroSoftware\UnbounceSdk\Unbounce;
use GuzzleHttp\Psr7\Response;

final class UnbounceTest extends TestCase
{
    public function test_unbounce_sdk_instance(): void
    {
        $this->assertInstanceOf(
            Unbounce::class,
            $this->getSdkWithMockedClient()
        );
    }

    public function test_throw_exception_when_unauthorized(): void
    {
        $sdk = $this->getSdkWithMockedClient([
            new Response(401, [], text_response('unauthorized')),
        ]);

        $this->expectException(RequestUnauthorizedException::class);

        $sdk->accounts()->all();
    }
}
