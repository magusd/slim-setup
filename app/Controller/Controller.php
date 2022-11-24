<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;

abstract class Controller
{
    public function __construct(
        protected ContainerInterface $container
    ) {}
}