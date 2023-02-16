<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
    }

    public function findAll(): array
    {
        $usersRepository = $this->em->getRepository(User::class);

        return $usersRepository->findAll();
    }

    public function create(User $user): User
    {
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}
