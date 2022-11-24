<?php

namespace App\Controller;

use App\Service\UserService;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController extends Controller
{
    public function test(Request $request, Response $response): Response
    {
        $response->getBody()->write(json_encode(['Ping?' => 'Ping!']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}