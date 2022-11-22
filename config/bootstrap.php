<?php

use Slim\Factory\AppFactory;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = require __DIR__ . '/../config/container.php';
$app = AppFactory::createFromContainer($container);

$routes = require __DIR__ . '/../routes/web.php';
$routes($app);

$api = require __DIR__ . '/../routes/api.php';
$api($app);

$app->run();