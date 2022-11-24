<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class UserService
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAll(): array
    {
        $usersRepo = $this->em->getRepository(User::class);
        return $usersRepo->findAll();
    }
}