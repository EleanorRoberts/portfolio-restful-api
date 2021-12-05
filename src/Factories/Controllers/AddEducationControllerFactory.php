<?php

namespace App\Factories\Controllers;

use App\Controllers\AddEducationController;
use Psr\Container\ContainerInterface;

class AddEducationControllerFactory
{
    public function __invoke(ContainerInterface $container): AddEducationController
    {
        $model = $container->get('EducationModel');
        return new AddEducationController($model);
    }
}