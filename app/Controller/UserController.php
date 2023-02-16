<?php

namespace App\Controller;

use App\Service\UserService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;

class UserController
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function index(Request $request, Response $response): Response
    {
        return $response->withJson([
            'data' => $this->userService->findAll(),
        ]);
    }

    public function store(Request $request, Response $response): Response
    {
        $payload = $request->getParsedBody();
        $user = $this->userService->create($payload);

        return $response->withJson([
            'data' => $user,
        ]);
    }
}
