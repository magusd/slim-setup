<?php

use Slim\App;
use App\Controllers\TestController;

return function (App $app) {
    $app->get('/', [TestController::class, 'index']);
};