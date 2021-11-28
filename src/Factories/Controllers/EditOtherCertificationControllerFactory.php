<?php

namespace App\Factories\Controllers;

use App\Controllers\EditOtherCertificationController;
use Psr\Container\ContainerInterface;

class EditOtherCertificationControllerFactory
{
    public function __invoke(ContainerInterface $container): EditOtherCertificationController
    {
        $model = $container->get('OtherCertifiationsModel');
        return new EditOtherCertificationController($model);
    }
}