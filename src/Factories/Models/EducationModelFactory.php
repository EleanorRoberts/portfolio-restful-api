<?php

namespace App\Factories\Models;

use App\Models\EducationModel;
use Psr\Container\ContainerInterface;

class EducationModelFactory
{
    public function __invoke(ContainerInterface $container): EducationModel
    {
        $db = $container->get('db');
        return new EducationModel($db);
    }
}