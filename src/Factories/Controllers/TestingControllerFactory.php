<?php

namespace App\Factories\Controllers;

use App\Controllers\TestingController;
use Psr\Container\ContainerInterface;

class TestingControllerFactory
{
    public function __invoke(ContainerInterface $container): TestingController
    {
        return new TestingController();
    }
}