<?php

namespace Beaver\PowerBI\Resources\DataSet;

class Table implements \JsonSerializable
{
    /**
     * The name of the table.
     *
     * @var string
     */
    private $__name = '';

    /**
     * Columns of ['name'=> 'type'] pairs for this table instance.
     *
     * @var array
     */
    private $__columns = [];

    /**
     * Create a new Table instance.
     *
     * @param  string  $name
     * @param  array   $columns
     * @return void
     */
    public function __construct($name, $columns = [])
    {
        $this->__name = $name;
        $this->__columns = $columns;
    }

    /**
     * Static method for creating self instance.
     *
     * @param  string  $name
     * @return static
     */
    public static function create($name)
    {
        return new static($name);
    }

    /**
     * Add a column to the Table instance.
     *
     * @param $name  string
     * @param $type  string
     */
    public function addColumn($name, $type)
    {
        $this->__columns[] = ['name' => $name, 'dataType' => $type];
        return $this;
    }

    /**
     * Returns the array of columns.
     *
     * @return  array
     */
    public function getColumns()
    {
        return $this->__columns;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return ['name' => $this->__name, 'columns' => $this->__columns];
    }
}
