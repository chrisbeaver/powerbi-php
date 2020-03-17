<?php
namespace PowerBI;

use GuzzleHttp\Client as Guzzle;

class Client
{
    private $__headers = [
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json',
    ];
    private $__url = 'https://login.microsoftonline.com/common/oauth2/token';
    private $__response;

    public function __construct($client_id, $client_secret, $username, $password)
    {
        $formData = [
            'grant_type' => 'password',
            'resource' => 'https://analysis.windows.net/powerbi/api',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'username' => $username,
            'password' => $password,
        ];

        $guzzle = new Guzzle;
        $response = $guzzle->post($this->__url, [
            'form_params' => $formData,
        ]);

        $this->__response = json_decode($response->getBody()->getContents(), true);
    }

    public static function generate()
    {
        $request = new self;
        return $request->token();
    }

    public function token()
    {
        return $this->__response['access_token'];
    }
}