<?php

namespace Beaver\PowerBI\Resources\DataSet;

class DataSet implements \JsonSerializable
{
    /**
     * The name of the dataset on PowerBI.
     *
     * @var string
     */
    private $__name;

    /**
     * Collection of Table objects sthat are in the dataset.
     *
     * @var array
     */
    private $__tables = [];

    /**
     * Create a new dataset instance.
     *
     * @param  string  $name
     * @param  array   $tables
     * @return void
     */
    public function __construct($name, $tables = [])
    {
        $this->__name = $name;
        $this->__tables = $tables;
    }

    /**
     * Create a new dataset object.
     *
     * @param  string  $name
     * @param  array   $tables
     * @return static
     */
    public static function create($name, array $tables = [])
    {
        return new static($name, $tables);
    }

    /**
     * Add a table to the dataset instance.
     *
     * @param  Table  $table
     * @return $this
     */
    public function addTable(Table $table)
    {
        $this->__tables[] = $table;
        return $this;
    }

    /**
     * Return the array of tables on the dataset.
     *
     * @return  array
     */
    public function getTables()
    {
        return $this->__tables;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return ['name' => $this->__name, 'tables' => $this->__tables];
    }
}
