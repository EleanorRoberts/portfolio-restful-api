<?php

namespace App\Factories\Controllers;

use App\Controllers\GetOneAboutMeController;
use Psr\Container\ContainerInterface;

class GetOneAboutMeControllerFactory
{
    public function __invoke(ContainerInterface $container): GetOneAboutMeController
    {
        $model = $container->get('AboutMeModel');
        return new GetOneAboutMeController($model);
    }
}