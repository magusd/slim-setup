<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/settings.php';

$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

$app->run();