<?php

namespace Beaver\PowerBI\Http;

use GuzzleHttp\Client;

class Request
{
    /**
     * The client instance for making HTTP requests.
     *
     * @var GuzzleHttp\Client
     */
    private $__client;

    /**
     * The collection of URLs for making PowerBI API requests.
     *
     * @var array
     */
    protected $__allRoutes;

    /**
     * Create a new request instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => "Bearer $token",
        ];
        $this->__allRoutes = require_once 'routes.php';
        $this->__client = new Client(['headers' => $headers]);
    }

    /**
     * Submit post request to server with provided data.
     *
     * @param  string  $url
     * @param  mixed   $data
     * @return mixed
     */
    protected function _post($url, $data)
    {
        try {
            $response = $this->__client->post($url, ['json' => $data]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Submit get request to server.
     *
     * @param  string  $url
     * @return mixed
     */
    protected function _get($url)
    {
        try {
            $response = $this->__client->get($url);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Submit delete request to server with provided data.
     *
     * @param  string  $url
     * @return mixed
     */
    protected function _delete($url)
    {
        try {
            $response = $this->__client->delete($url);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        return json_decode($response->getBody()->getContents(), true);
    }
}
