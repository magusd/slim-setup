<?php

use DI\Container;
use Slim\App;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = new Container();
$containerSettings = require __DIR__ . '/../config/container.php';
$containerSettings($container);

$app = $container->get(App::class);
$app->run();