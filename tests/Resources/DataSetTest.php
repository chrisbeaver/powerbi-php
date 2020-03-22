<?php

namespace Beaver\PowerBI\Tests;

use Beaver\PowerBI\Resources\DataSet\Dataset;
use Beaver\PowerBI\Resources\DataSet\Table;
use Beaver\PowerBI\Resources\DataSet\Type;
use PHPUnit\Framework\TestCase;

class DataSetTest extends TestCase
{
    /**
     * DataSet to be tested.
     *
     * @var DataSet
     */
    private $__dataSet;

    /**
     * Setup the units to be tested.
     *
     * @return  void
     */
    public function setUp(): void
    {
        $this->__dataSet = Dataset::create('testing');
    }

    public function testAddingTables()
    {
        $this->assertEquals([], $this->__dataSet->getTables());

        $table1 = Table::create('person')
            ->addColumn('name', Type::STRING)
            ->addColumn('birthday', Type::DATETIME)
            ->addColumn('age', Type::INTEGER);

        $this->assertEquals([
            ['name' => 'name', 'dataType' => Type::STRING],
            ['name' => 'birthday', 'dataType' => Type::DATETIME],
            ['name' => 'age', 'dataType' => Type::INTEGER],
        ], $table1->getColumns());

        $table2 = Table::create('account')
            ->addColumn('amount', Type::DOUBLE)
            ->addColumn('last_deposit', Type::DATETIME);

        $this->assertEquals([
            ['name' => 'amount', 'dataType' => Type::DOUBLE],
            ['name' => 'last_deposit', 'dataType' => Type::DATETIME],
        ], $table2->getColumns());

        $this->__dataSet->addTable($table1)->addTable($table2);
        $this->assertEquals([$table1, $table2], $this->__dataSet->getTables());
    }

}
