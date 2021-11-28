<?php

namespace App\Factories\Models;

use App\Models\AboutMeModel;
use Psr\Container\ContainerInterface;

class AboutMeModelFactory
{
    public function __invoke(ContainerInterface $container): AboutMeModel
    {
        $db = $container->get('db');
        return new AboutMeModel($db);
    }
}