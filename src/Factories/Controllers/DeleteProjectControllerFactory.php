<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteProjectController;
use Psr\Container\ContainerInterface;

class DeleteProjectControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteProjectController
    {
        $model = $container->get('ProjectsModel');
        return new DeleteProjectController($model);
    }
}