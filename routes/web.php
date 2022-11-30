<?php

use Slim\App;
use App\Controller\TestController;

return function (App $app) {
    $app->get('/', [TestController::class, 'index']);
};