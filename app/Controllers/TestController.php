<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write('Ok.');
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}