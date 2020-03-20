<?php

namespace Beaver\PowerBI\Http;

use Beaver\PowerBI\Resources\DataSet\DataSet as Database;

class DataSet extends Request
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
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        parent::__construct($token);
        $this->__routes = $this->__allRoutes['DataSet'];
    }

    /**
     * Submit request to create a new dataset.
     *
     * @param  Dataset  $dataSet
     * @return mixed
     */
    public function create(Database $dataSet)
    {
        $url = $this->__routes['create'];
        return $this->_post($url, $dataSet);
    }

    /**
     * Submit request to delete given dataset.
     *
     * @param  string  $dataSetID
     * @return mixed
     */
    public function delete($dataSetID)
    {
        $url = sprintf($this->__routes['delete'], $dataSetID);
        return $this->_delete($url);
    }

    /**
     * Submit request to get all datasets for stored credentials.
     *
     * @return mixed
     */
    public function get()
    {
        $url = $this->__routes['get'];
        return $this->_get($url);
    }

    /**
     * Submit request to add data to an existing dataset.
     *
     * @param  string  $dataSetID
     * @param  string  $tableName
     * @param  array   $rows
     * @return mixed
     */
    public function addRows($dataSetID, $tableName, array $rows)
    {
        $url = sprintf($this->__routes['addRows'], $dataSetID, $tableName);
        return $this->_post($url, $rows);
    }
}
