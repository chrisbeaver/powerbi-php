<?php

namespace Beaver\PowerBI\Resources\DataSet;

class DataSet implements \JsonSerializable
{
    /**
     * Name of DataSet
     */
    private $__name;

    /**
     * Tables to be created/manipulated in DataSet.
     */
    private $__tables = [];

    public function __construct($name, $tables = [])
    {
        $this->__name = $name;
        $this->__tables = $tables;
    }

    public function jsonSerialize()
    {
        return ['name' => $this->__name, 'tables' => $this->__tables];
    }

    public static function create($name, $tables = [])
    {
        return new static($name, $tables);
    }

    public function addTable(Table $table)
    {
        $this->__tables[] = $table;
        return $this;
    }

    // public function json()
    // {
    //     return json_encode($table, JSON_PRETTY_PRINT)
    // }
}
