<?php

use Slim\App;
use App\Controllers\TestController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/', [TestController::class, 'index']);
    });
};
