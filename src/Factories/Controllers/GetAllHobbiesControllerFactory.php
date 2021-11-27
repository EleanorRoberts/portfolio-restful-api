<?php

namespace App\Factories\Controllers;

use App\Controllers\GetAllHobbiesController;
use Psr\Container\ContainerInterface;

class GetAllHobbiesControllerFactory
{
    public function __invoke(ContainerInterface $container): GetAllHobbiesController
    {
        $model = $container->get('HobbiesModel');
        return new GetAllHobbiesController($model);
    }
}