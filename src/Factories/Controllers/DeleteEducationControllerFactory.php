<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteEducationController;
use Psr\Container\ContainerInterface;

class DeleteEducationControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteEducationController
    {
        $model = $container->get('EducationModel');
        return new DeleteEducationController($model);
    }
}