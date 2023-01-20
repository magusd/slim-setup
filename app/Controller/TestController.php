<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response;

class TestController extends Controller
{
    public function index(Request $request, Response $response): ResponseInterface
    {
        /* @var EntityManager $em */
        $em = $this->get(EntityManager::class);
        $userRepository = $em->getRepository(User::class);

        return $response->withJson(['data' => $userRepository->findAll()]);
    }
}
