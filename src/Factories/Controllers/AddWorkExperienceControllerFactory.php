<?php

namespace App\Factories\Controllers;

use App\Controllers\AddWorkExperienceController;
use Psr\Container\ContainerInterface;

class AddWorkExperienceControllerFactory
{
    public function __invoke(ContainerInterface $container): AddWorkExperienceController
    {
        $model = $container->get('WorkExperienceModel');
        return new AddWorkExperienceController($model);
    }
}