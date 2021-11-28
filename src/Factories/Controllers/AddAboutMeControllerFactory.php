<?php

namespace App\Factories\Controllers;

use App\Controllers\AddAboutMeController;
use Psr\Container\ContainerInterface;

class AddAboutMeControllerFactory
{
    public function __invoke(ContainerInterface $container): AddAboutMeController
    {
        $model = $container->get('AboutMeModel');
        return new AddAboutMeController($model);
    }
}