<?php

namespace App\Factories\Controllers;

use App\Controllers\EditProjectController;
use Psr\Container\ContainerInterface;

class EditProjectControllerFactory
{
    public function __invoke(ContainerInterface $container): EditProjectController
    {
        $model = $container->get('ProjectsModel');
        return new EditProjectController($model);
    }
}