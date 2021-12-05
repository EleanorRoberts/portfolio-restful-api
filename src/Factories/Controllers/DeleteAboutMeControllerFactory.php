<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteAboutMeController;
use Psr\Container\ContainerInterface;

class DeleteAboutMeControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteAboutMeController
    {
        $model = $container->get('AboutMeModel');
        return new DeleteAboutMeController($model);
    }
}