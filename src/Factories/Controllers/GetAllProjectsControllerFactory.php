<?php

namespace App\Factories\Controllers;

use App\Abstracts\Controller;
use App\Controllers\GetAllProjectsController;
use Psr\Container\ContainerInterface;

class GetAllProjectsControllerFactory
{
    public function __invoke(ContainerInterface $container): GetAllProjectsController
    {
        $model = $container->get('ProjectsModel');
        return new GetAllProjectsController($model);
    }
}