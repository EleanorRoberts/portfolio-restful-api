<?php

namespace App\Factories\Models;

use App\Models\WorkExperienceModel;
use Psr\Container\ContainerInterface;

class WorkExperienceModelFactory
{
    public function __invoke(ContainerInterface $container): WorkExperienceModel
    {
        $db = $container->get('db');
        return new WorkExperienceModel($db);
    }
}