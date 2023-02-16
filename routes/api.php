<?php

use App\Controller\UserController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/users', [UserController::class, 'index']);
        $group->post('/users', [UserController::class, 'store']);
    });
};
