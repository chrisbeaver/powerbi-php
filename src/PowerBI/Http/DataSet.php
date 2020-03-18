<?php

namespace Beaver\PowerBI\Http;

class DataSet extends Request
{
    public function __construct($token)
    {
        parent::__construct($token);
        $this->__routes = $this->__routes['DataSet'];
    }

    public function create()
    {
        $url = $this->__routes['create'];
        $table = [
            'name' => 'API Created Table',
            'tables' => [
                [
                    'name' => 'Budget',
                    'columns' => [
                        [
                            'name' => 'Expense',
                            'dataType' => 'Int64',
                        ],
                        [
                            'name' => 'Chemical',
                            'dataType' => 'String',
                        ],
                    ],
                ],
            ],
        ];
        return var_dump($this->post($url, $table));
    }

    public function get()
    {

    }

    public function addRows()
    {

    }
}
