<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService
{
    public function __construct(
        public readonly UserRepository $userRepository
    ) {
    }

    public function findAll(): array
    {
        return $this->userRepository->findAll();
    }

    public function create(array $data): User
    {
        $user = new User();
        $user->setUsername($data['name']);
        $user->setEmail($data['email']);

        return $this->userRepository->create($user);
    }
}
