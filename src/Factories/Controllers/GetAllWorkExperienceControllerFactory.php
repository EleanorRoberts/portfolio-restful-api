<?php

namespace App\Factories\Controllers;

use App\Controllers\GetAllWorkExperienceController;
use Psr\Container\ContainerInterface;

class GetAllWorkExperienceControllerFactory
{
    public function __invoke(ContainerInterface $container): GetAllWorkExperienceController
    {
        $model = $container->get('WorkExperienceModel');
        return new GetAllWorkExperienceController($model);
    }
}