<?php

namespace Beaver\PowerBI\Tests;

use Beaver\PowerBI\Http\Client;
use Beaver\PowerBI\Resources\DataSet\DataSet;
use Beaver\PowerBI\Resources\DataSet\Table;
use Beaver\PowerBI\Resources\DataSet\Type;
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

    public function testClientCanPostDataSetToServer()
    {
        // We want to mock the API request.
        $stream1 = Psr7\stream_for('{"access_token" : "ABCDEFG"}');
        $stream2 = Psr7\stream_for('{"id" : "1234567890"}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream1),
            new Response(200, ['Content-Type' => 'application/json'], $stream2),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $guzzle = new Guzzle(['handler' => $handlerStack]);

        $client = new Client('$client_id', '$client_secret', '$username', '$password', $guzzle);

        $dataSet = $this->__buildDataSet();
        $response = $client->dataSet($guzzle)->create($dataSet);

        $this->assertEquals($response['id'], '1234567890');
    }

    private function __buildDataSet()
    {
        $dataSet = DataSet::create('Testing Database from API');

        $table1 = Table::create('person')
            ->addColumn('name', Type::STRING)
            ->addColumn('birthday', Type::DATETIME)
            ->addColumn('age', Type::INTEGER);

        $table2 = Table::create('account')
            ->addColumn('amount', Type::DOUBLE)
            ->addColumn('last_deposit', Type::DATETIME);

        $dataSet->addTable($table1)->addTable($table2);
        return $dataSet;
    }

}
