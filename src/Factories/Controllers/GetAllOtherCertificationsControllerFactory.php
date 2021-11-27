<?php

namespace App\Factories\Controllers;

use App\Controllers\GetAllOtherCertificationsController;
use Psr\Container\ContainerInterface;

class GetAllOtherCertificationsControllerFactory
{
    public function __invoke(ContainerInterface $container): GetAllOtherCertificationsController
    {
        $model = $container->get('OtherCertificationsModel');
        return new GetAllOtherCertificationsController($model);
    }
}