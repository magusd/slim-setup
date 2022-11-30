<?php

namespace App\Controller;

use App\Service\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        /** @var UserRepository $usersRepo */
        $usersRepo = $this->get(UserRepository::class);
        $users = $usersRepo->findAll();

        $response->getBody()->write(json_encode(['Ping?' => 'Ping!']));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}