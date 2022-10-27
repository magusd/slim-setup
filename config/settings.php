<?php

return [
    'slim' => [
        'displayErrorDetails' => true,
        'logErrors' => true,
        'logErrorDetails' => true,
    ],
    'doctrine' => [
        'dev_mode' => true,
        'cache_dir' => __DIR__ . '/var/doctrine',
        'metadata_dirs' => [__DIR__ . '/../app/Entities'],
        'connection' => [
            'driver' => $_ENV['DB_DRIVER'],
            'path' => $_ENV['DB_DRIVER'] === 'pdo_sqlite' ? __DIR__ . '/../database/database.sqlite' : '',
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf-8'
        ]
    ]
];