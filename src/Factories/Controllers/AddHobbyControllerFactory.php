<?php

namespace App\Factories\Controllers;

use App\Controllers\AddHobbyController;
use Psr\Container\ContainerInterface;

class AddHobbyControllerFactory
{
    public function __invoke(ContainerInterface $container): AddHobbyController
    {
        $model = $container->get('HobbiesModel');
        return new AddHobbyController($model);
    }
}