<?php

namespace App\Factories\Controllers;

use App\Controllers\EditWorkExperienceController;
use Psr\Container\ContainerInterface;

class EditWorkExperienceControllerFactory
{
    public function __invoke(ContainerInterface $container): EditWorkExperienceController
    {
        $model = $container->get('WorkExperienceModel');
        return new EditWorkExperienceController($model);
    }
}