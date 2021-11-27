<?php

namespace App\Factories\Models;

use App\Models\OtherCertificationsModel;
use Psr\Container\ContainerInterface;

class OtherCertificationsModelFactory
{
    public function __invoke(ContainerInterface $container): OtherCertificationsModel
    {
        $db = $container->get('db');
        return new OtherCertificationsModel($db);
    }
}