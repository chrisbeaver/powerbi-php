<?php

namespace Beaver\PowerBI\Resources;

class Group implements \JsonSerializable
{
    /**
     * The name of the dataset on PowerBI.
     *
     * @var string
     */
    private $__name;

    /**
     * The PowerBI UUID assigned to the group.
     *
     * @var array
     */
    private $__uuid;

    /**
     * Create a new group instance.
     *
     * @param  string  $name
     * @return void
     */
    public function __construct($name)
    {
        $this->__name = $name;
    }

    /**
     * Create a new group object.
     *
     * @param  string  $name
     * @return static
     */
    public static function create($name)
    {
        return new static($name);
    }

    /**
     * Return the group UUID.
     *
     * @return  array
     */
    public function getUUID()
    {
        return $this->__uuid;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return ['name' => $this->__name, 'uuid' => $this->__uuid];
    }
}
