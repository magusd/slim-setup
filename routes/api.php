<?php

use App\Controller\UserController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', function($request, $response){
        $response->getBody()->write('Yo yo, checkout the <a href="https://github.com/davisenra/slim-setup">docs</a> ');
        return $response;
    });

    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/users', [UserController::class, 'index']);
        $group->post('/users', [UserController::class, 'store']);
    });
};
