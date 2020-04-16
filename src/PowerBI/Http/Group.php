<?php

namespace Beaver\PowerBI\Http;

class Group extends Request
{
    /**
     * The collection of DataSet URLs for making PowerBI API requests.
     *
     * @var array
     */
    protected $__routes;

    /**
     * Create a new dataset request instance.
     *
     * @param  mixed  $tokenOrTestClient
     * @return void
     */
    public function __construct($tokenOrTestClient)
    {
        parent::__construct($tokenOrTestClient);
        $this->__routes = $this->__allRoutes['Group'];
    }

    /**
     * Submit request to get all groups for stored credentials.
     *
     * @return mixed
     */
    public function get()
    {
        $url = $this->__routes['get'];
        return $this->_get($url);
    }

    /**
     * Returns dataSets for a specific group.
     *
     * @return mixed
     */
    public function dataSets($groupId)
    {
        $url = $this->__url['dataSets'];
        return $this->_get($url);
    }
}
