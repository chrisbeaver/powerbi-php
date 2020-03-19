<?php

namespace Beaver\PowerBI\Resources\DataSet;

class Table implements \JsonSerializable
{
    private $__name = [];
    private $__columns = [];

    public function __construct($name, $columns = [])
    {
        $this->__name = $name;
        $this->__columns = $columns;
    }

    public static function create($name)
    {
        return new static($name);
    }

    /**
     * @param $name  string
     * @param $type  string
     */
    public function addColumn($name, $type)
    {
        $this->__columns[] = ['name' => $name, 'dataType' => $type];
        return $this;
    }

    public function jsonSerialize()
    {
        return ['name' => $this->__name, 'columns' => $this->__columns];
    }
}
