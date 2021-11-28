<?php

namespace App\Factories\Controllers;

use App\Controllers\AddProjectController;
use Psr\Container\ContainerInterface;

class AddProjectControllerFactory
{
    public function __invoke(ContainerInterface $container): AddProjectController
    {
        $model = $container->get('ProjectsModel');
        return new AddProjectController($model);
    }
}