<?php
namespace Beaver\PowerBI\Http;

use GuzzleHttp\Client as Guzzle;

class Client
{
    /**
     * The headers used for requesting an access token.
     *
     * @var array
     */
    private $__headers = [
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json',
    ];

    /**
     * The url for submitting a request to get an access key.
     *
     * @var string
     */
    private $__url = 'https://login.microsoftonline.com/common/oauth2/token';

    /**
     * Cached response from requesting an access token.
     *
     * @var string
     */
    private $__response;

    /**
     * Cached dataset instance for making request to manipulate a dataset.
     *
     * @var DataSet
     */
    private $__dataSet;

    /**
     * Create a new Guzzle client instance.
     *
     * @param  string  $client_id
     * @param  string  $client_secret
     * @param  string  $username
     * @param  string  $password
     * @return void
     */
    public function __construct($client_id, $client_secret, $username, $password, $httpClient = null)
    {
        $formData = [
            'grant_type' => 'password',
            'resource' => 'https://analysis.windows.net/powerbi/api',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'username' => $username,
            'password' => $password,
        ];

        $httpClient = $httpClient ?? new Guzzle;
        $response = $httpClient->post($this->__url, [
            'form_params' => $formData,
        ]);

        $this->__response = json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Static method to build new instance of Client.
     *
     * @param  string  $client_id
     * @param  string  $client_secret
     * @param  string  $username
     * @param  string  $password
     * @return string
     */
    public static function generate($id, $secret, $username, $password)
    {
        $request = new self($id, $secret, $username, $password);
        return $request->token();
    }

    /**
     * Return the access token produced on creating the instance.
     *
     * @return string
     */
    public function token()
    {
        return $this->__response['access_token'];
    }

    /**
     * Returns class to chain methods off of for manipulating a dataset.
     *
     * @return Beaver\PowerBI\Http\DataSet
     */
    public function dataSet($testingHttpClient = null)
    {
        if ($this->__dataSet) {
            return $this->__dataSet;
        }
        $this->__dataSet = $testingHttpClient ?
        new DataSet($testingHttpClient) :
        new DataSet($this->token());

        return $this->__dataSet;
    }
}
