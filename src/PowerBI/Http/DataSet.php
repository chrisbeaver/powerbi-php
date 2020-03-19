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
        return $this->post($url, $dataSet);
    }

    public function getAll()
    {
        $url = $this->__routes['get'];
        return $this->get($url);
    }

    public function addRows($dataSetID, $tableName, array $rows)
    {
        $url = sprintf($this->__routes['addRows'], $dataSetID, $tableName);
        return $this->post($url, $rows);
    }
}
