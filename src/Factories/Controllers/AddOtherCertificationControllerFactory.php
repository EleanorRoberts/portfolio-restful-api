<?php

namespace App\Factories\Controllers;

use App\Controllers\AddOtherCertificationController;
use Psr\Container\ContainerInterface;

class AddOtherCertificationControllerFactory
{
    public function __invoke(ContainerInterface $container): AddOtherCertificationController
    {
        $model = $container->get('OtherCertificationsModel');
        return new AddOtherCertificationController($model);
    }
}