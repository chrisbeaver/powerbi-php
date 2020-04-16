<?php
/**
 * This is the central location for all routes that the library will
 * access the API from using the given methods.
 */

return [
    'DataSet' => [
        'create' => 'https://api.powerbi.com/v1.0/myorg/datasets',
        'createInGroup' => 'https://api.powerbi.com/v1.0/myorg/groups/%s/datasets',
        'delete' => 'https://api.powerbi.com/v1.0/myorg/datasets/%s',
        'get' => 'https://api.powerbi.com/v1.0/myorg/datasets',
        'addRows' => 'https://api.powerbi.com/v1.0/myorg/datasets/%s/tables/%s/rows',
        'addRowsInGroup' => 'https://api.powerbi.com/v1.0/myorg/groups/%s/datasets/%s/tables/%s/rows',
    ],
    'Group' => [
        'get' => 'https://api.powerbi.com/v1.0/myorg/groups',
        'dataSets' => 'https://api.powerbi.com/v1.0/myorg/groups/%s/datasets',
    ],
];
