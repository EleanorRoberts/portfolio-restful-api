<?php

namespace App\Factories\Controllers;

use App\Controllers\EditHobbyController;
use Psr\Container\ContainerInterface;

class EditHobbyControllerFactory
{
    public function __invoke(ContainerInterface $container): EditHobbyController
    {
        $model = $container->get('HobbiesModel');
        return new EditHobbyController($model);
    }
}