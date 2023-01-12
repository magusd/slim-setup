<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class UserRepository
{
    public function __construct(
        private readonly EntityManager $em
    ) {}

    public function findAll(): array
    {
        $usersRepository = $this->em->getRepository(User::class);

        return $usersRepository->findAll();
    }

    public function findById(mixed $id): object|null
    {
        $usersRepository = $this->em->getRepository(User::class);

        return $usersRepository->find($id);
    }
}