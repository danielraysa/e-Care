<?php

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS_ORACLE', ''),
        'host'          => env('DB_HOST_ORACLE', ''),
        'port'          => env('DB_PORT_ORACLE', '1521'),
        'database'      => env('DB_DATABASE_ORACLE', ''),
        'username'      => env('DB_USERNAME_ORACLE', ''),
        'password'      => env('DB_PASSWORD_ORACLE', ''),
        'charset'       => env('DB_CHARSET_ORACLE', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX_ORACLE', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX_ORACLE', ''),
    ],
];
