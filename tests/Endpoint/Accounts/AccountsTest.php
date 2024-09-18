<?php

declare(strict_types=1);

namespace AdroSoftware\UnbounceSdk\Tests\Endpoint\AccountsTest;

use AdroSoftware\UnbounceSdk\Tests\TestCase;
use GuzzleHttp\Psr7\Response;

class AccountsTest extends TestCase
{
    public function test_it_can_get_accounts()
    {
        $sdk = $this->getSdkWithMockedClient([
            new Response(200, [], json_response('accounts')),
        ]);

        $response = $sdk->accounts()
            ->get();

        $this->assertIsArray($response);
        $this->assertArrayHasKey('accounts', $response);
        $this->assertSame(1, $response['accounts'][0]['id']);
        $this->assertSame('active', $response['accounts'][0]['state']);
    }

    public function test_it_can_find_an_account()
    {
        $sdk = $this->getSdkWithMockedClient([
            new Response(200, [], json_response('account')),
        ]);

        $response = $sdk->accounts()
            ->find(1);

        $this->assertIsArray($response);
        $this->assertSame(1, $response['id']);
        $this->assertSame('active', $response['state']);
    }
}
