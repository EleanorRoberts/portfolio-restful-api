<?php

namespace App\Factories\Models;

use App\Models\ProjectsModel;
use Psr\Container\ContainerInterface;

class ProjectModelFactory
{
    public function __invoke(ContainerInterface $container): ProjectsModel
    {
        $db = $container->get('db');
        return new ProjectsModel($db);
    }
}