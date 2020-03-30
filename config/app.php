<?php

return [
    'app_url' => 'http://localhost:8000',
    'database' => [
        'driver' => 'mysql', // Db driver
        'host' => '127.0.0.1',
        'database' => 'task-management',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8', // Optional
        'collation' => 'utf8_unicode_ci', // Optional
        'options' => [ // PDO constructor options, optional
            PDO::ATTR_TIMEOUT => 5,
            PDO::ATTR_EMULATE_PREPARES => false,
        ],
    ]
];