<?php

namespace App\Factories\Controllers;

use App\Controllers\DeleteOtherCertificationController;
use Psr\Container\ContainerInterface;

class DeleteOtherCertificationControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteOtherCertificationController
    {
        $model = $container->get('OtherCertificationsModel');
        return new DeleteOtherCertificationController($model);
    }
}