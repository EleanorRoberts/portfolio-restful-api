<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['db'] = function () {
        $db = new PDO('mysql:host=127.0.0.1;dbname=CV', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    // Models
    $container['WorkExperienceModel'] = DI\factory('\App\Factories\Models\WorkExperienceModelFactory');
    $container['EducationModel'] = DI\factory('\App\Factories\Models\EducationModelFactory');
    $container['ProjectsModel'] = DI\factory('\App\Factories\Models\ProjectModelFactory');
    $container['OtherCertificationsModel'] = DI\factory('\App\Factories\Models\OtherCertificationsModelFactory');
    $container['HobbiesModel'] = DI\factory('\App\Factories\Models\HobbiesModelFactory');
    $container['AboutMeModel'] = DI\factory('\App\Factories\Models\AboutMeModelFactory');
    // Controllers
    $container['GetAllWorkExperienceController'] = DI\factory('\App\Factories\Controllers\GetAllWorkExperienceControllerFactory');
    $container['GetAllEducationController'] = DI\factory('\App\Factories\Controllers\GetAllEducationControllerFactory');
    $container['GetAllProjectsController'] = DI\factory('\App\Factories\Controllers\GetAllProjectsControllerFactory');
    $container['GetAllOtherCertificationsController'] = DI\factory('\App\Factories\Controllers\GetAllOtherCertificationsControllerFactory');
    $container['GetAllHobbiesController'] = DI\factory('\App\Factories\Controllers\GetAllHobbiesControllerFactory');
    $container['GetAllAboutMeController'] = DI\factory('\App\Factories\Controllers\GetAllAboutMeControllerFactory');
    $container['GetOneAboutMeController'] = DI\factory('\App\Factories\Controllers\GetOneAboutMeControllerFactory');

    $containerBuilder->addDefinitions($container);
};
