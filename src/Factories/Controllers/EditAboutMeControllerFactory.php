<?php

namespace App\Factories\Controllers;

use App\Controllers\EditAboutMeController;
use Psr\Container\ContainerInterface;

class EditAboutMeControllerFactory
{
    public function __invoke(ContainerInterface $container): EditAboutMeController
    {
        $model = $container->get('AboutMeModel');
        return new EditAboutMeController($model);
    }
}