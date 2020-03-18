<?php

namespace Beaver\PowerBI\Http;

use GuzzleHttp\Client;

class Request
{
    private $__client;
    protected $__routes;

    public function __construct($token)
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => "Bearer $token",
        ];
        $this->__routes = require_once 'routes.php';
        $this->__client = new Client(['headers' => $headers]);
    }

    public function post($url, $data)
    {
        try {
            $response = $this->__client->post($url, ['json' => $data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function get()
    {

    }
}
