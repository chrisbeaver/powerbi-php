<?php

namespace Beaver\PowerBI\Tests;

use Beaver\PowerBI\Http\Client;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * Client to be tested.
     *
     * @var Client
     */
    private $__client;

    public function testClientCanGetAccessToken()
    {
        // We want to mock the API request.
        $stream = Psr7\stream_for('{"access_token" : "ABCDEFG"}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $guzzle = new Guzzle(['handler' => $handlerStack]);

        $client = new Client('$client_id', '$client_secret', '$username', '$password', $guzzle);

        $this->assertEquals('ABCDEFG', $client->token());
    }

}
