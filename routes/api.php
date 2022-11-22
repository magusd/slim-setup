<?php

use App\Controllers\TestController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/', [TestController::class, 'index']);
    });
};