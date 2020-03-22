# powerbi-php

[![Build Status](https://travis-ci.com/chrisbeaver/powerbi-php.svg?token=6sNEGutzUeKZiHnqpERv&branch=master)](https://travis-ci.com/chrisbeaver/powerbi-php)

## Usage

Trigger Build

1. To prepare a dataset on PowerBI, use the Resources provided to design the dataset and tables.

`$dataSet = Beaver\PowerBI\Resources\DataSet\DataSet::create('Testing Database from API');`

With the dataset created, we can now create tables to add to it.

```
use Beaver\PowerBI\Resources\DataSet\Table;
use Beaver\PowerBI\Resources\DataSet\Type;

$table1 = Table::create('person')
    ->addColumn('name', Type::STRING)
    ->addColumn('birthday', Type::DATETIME)
    ->addColumn('age', Type::INTEGER);

$table2 = Table::create('account')
    ->addColumn('amount', Type::DOUBLE)
    ->addColumn('last_deposit', Type::DATETIME);
```

Now we have a dataset and tables, we just need to assign the tables to the dataset.

`$dataSet->addTable($table1)->addTable($table2);`

With everything built, time to put it on the server.

---

2. Submit the dataset to the server.

First build the HTTP client.

`$client = new Beaver\PowerBI\Http\Client($client_id, $client_secret, $username, $password);`

Now use the client to post the dataset to the server and get our response.

`$response = $client->dataSet()->create($dataSet);`

We get back a response array from the server, and in this array we can get the PowerBI UUID assigned to the dataset so we can then add rows of data to it.

`$dataSetID = $response['id'];`

Next we can add some data to the schema we designed using the tables and columns. Here we'll just create some rows of data for the account table.

```
$rows1 = [
    ['amount' => 300.50, 'last_deposit' => '09/10/2012'],
    ['amount' => 212.12, 'last_deposit' => '09/07/2019'],
];

$rows2 = [
    ['amount' => 99.50, 'last_deposit' => '01/23/2017'],
    ['amount' => 10.00, 'last_deposit' => '01/29/2015'],
];
```

This demo is just preparing two different requests for entering data to the `account` table we created before. Always use an array of rows. With our client already established, we use this to make additional requests to the server for adding our data.

```
$client->dataSet()->addRows($dataSetID, 'account', $rows1);
$client->dataSet()->addRows($dataSetID, 'account', $rows2);
```

We now have a dataset with data populated in it on the PowerBI server ready for designing reports.
