<?php

namespace Beaver\PowerBI\Http;

use Beaver\PowerBI\Resources\DataSet\DataSet as Database;

class DataSet extends Request
{
    protected $__routes;

    public function __construct($token)
    {
        parent::__construct($token);
        $this->__routes = $this->__allRoutes['DataSet'];
    }

    public function create(Database $dataSet)
    {
        $url = $this->__routes['create'];
        return $this->_post($url, $dataSet);
    }

    public function delete($dataSetID)
    {
        $url = sprintf($this->__routes['delete'], $dataSetID);
        return $this->_delete($url);
    }

    public function get()
    {
        $url = $this->__routes['get'];
        return $this->_get($url);
    }

    public function addRows($dataSetID, $tableName, array $rows)
    {
        $url = sprintf($this->__routes['addRows'], $dataSetID, $tableName);
        return $this->_post($url, $rows);
    }
}
