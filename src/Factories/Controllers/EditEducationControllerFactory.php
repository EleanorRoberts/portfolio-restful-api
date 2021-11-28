<?php

namespace App\Factories\Controllers;

use App\Controllers\EditEducationController;
use Psr\Container\ContainerInterface;

class EditEducationControllerFactory
{
    public function __invoke(ContainerInterface $container): EditEducationController
    {
        $model = $container->get('EducationModel');
        return new EditEducationController($model);
    }
}