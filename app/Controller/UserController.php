<?php

namespace App\Controller;

use App\Service\UserService;
use App\Traits\Serializable;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    use Serializable;

    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write($this->toJson($this->service->findAll()));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}