<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteWorkExperienceController;
use Psr\Container\ContainerInterface;

class DeleteWorkExperienceControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteWorkExperienceController
    {
        $model = $container->get('WorkExperienceModel');
        return new DeleteWorkExperienceController($model);
    }
}