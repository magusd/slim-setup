<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TestController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->get(UserRepository::class);
        $users = $userRepository->findAll();
        // $user = $userRepository->findById(1);

        $normalizers = [new ObjectNormalizer()];
        $encoders = [new JsonEncoder()];
        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize([
            'data' => $users
        ], 'json');

        $response->getBody()->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}