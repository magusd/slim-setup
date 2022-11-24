<?php

use App\Controller\UserController;
use Slim\App;
use App\Controller\TestController;

return function (App $app) {
    $app->get('/', [TestController::class, 'test']);
    $app->get('/users', [UserController::class, 'index']);
};