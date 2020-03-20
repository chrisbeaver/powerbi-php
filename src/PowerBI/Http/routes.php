<?php
/**
 * This is the central location for all routes that the library will
 * access the API from using the given methods.
 */

return [
    'DataSet' => [
        'create' => 'https://api.powerbi.com/v1.0/myorg/datasets',
        'delete' => 'https://api.powerbi.com/v1.0/myorg/datasets/%s',
        'getAll' => 'https://api.powerbi.com/v1.0/myorg/datasets',
        'addRows' => 'https://api.powerbi.com/v1.0/myorg/datasets/%s/tables/%s/rows',
    ],
];
