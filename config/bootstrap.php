<?php

use DI\Bridge\Slim\Bridge;
use DI\Container;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = new Container();
$containerSettings = require __DIR__ . '/../config/container.php';
$containerSettings($container);

$app = Bridge::create($container);
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

$routes = require __DIR__ . '/../routes/web.php';
$routes($app);

$api = require __DIR__ . '/../routes/api.php';
$api($app);

$app->run();