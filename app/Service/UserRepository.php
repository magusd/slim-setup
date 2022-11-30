<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class UserRepository
{
    public function __construct(
        private readonly EntityManager $em
    ) {}

    public function findAll(): array
    {
        $usersRepo = $this->em->getRepository(User::class);
        return $usersRepo->findAll();
    }
}