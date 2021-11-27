<?php

namespace App\Factories\Models;

use App\Models\HobbiesModel;
use Psr\Container\ContainerInterface;

class HobbiesModelFactory
{
    public function __invoke(ContainerInterface $container): HobbiesModel
    {
        $db = $container->get('db');
        return new HobbiesModel($db);
    }
}