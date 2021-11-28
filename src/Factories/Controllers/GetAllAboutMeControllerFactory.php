<?php

namespace App\Factories\Controllers;

use App\Controllers\GetAllAboutMeController;
use Psr\Container\ContainerInterface;

class GetAllAboutMeControllerFactory
{
    public function __invoke(ContainerInterface $container): GetAllAboutMeController
    {
        $model = $container->get('AboutMeModel');
        return new GetAllAboutMeController($model);
    }
}