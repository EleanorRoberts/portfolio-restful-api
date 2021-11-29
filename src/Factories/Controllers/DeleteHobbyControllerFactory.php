<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteHobbyController;
use Psr\Container\ContainerInterface;

class DeleteHobbyControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteHobbyController
    {
        $model = $container->get('HobbiesModel');
        return new DeleteHobbyController($model);
    }
}