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
        $db = new PDO('mysql:host=127.0.0.1;dbname=CV;charset=UTF8', 'root', 'password');
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
    // Work Experience
    $container['GetAllWorkExperienceController'] = DI\factory('\App\Factories\Controllers\GetAllWorkExperienceControllerFactory');
    $container['AddWorkExperienceController'] = DI\factory('\App\Factories\Controllers\AddWorkExperienceControllerFactory');
    $container['EditWorkExperienceController'] = DI\factory('\App\Factories\Controllers\EditWorkExperienceControllerFactory');
    $container['DeleteWorkExperienceController'] = DI\factory('\App\Factories\Controllers\DeleteWorkExperienceControllerFactory');
    // Projects
    $container['GetAllProjectsController'] = DI\factory('\App\Factories\Controllers\GetAllProjectsControllerFactory');
    $container['AddProjectController'] = DI\factory('\App\Factories\Controllers\AddProjectControllerFactory');
    $container['EditProjectController'] = DI\factory('\App\Factories\Controllers\EditProjectControllerFactory');
    $container['DeleteProjectController'] = DI\factory('\App\Factories\Controllers\DeleteProjectControllerFactory');
    // Education
    $container['GetAllEducationController'] = DI\factory('\App\Factories\Controllers\GetAllEducationControllerFactory');
    $container['AddEducationController'] = DI\factory('\App\Factories\Controllers\AddEducationControllerFactory');
    $container['EditEducationController'] = DI\factory('\App\Factories\Controllers\EditEducationControllerFactory');
    $container['DeleteEducationController'] = DI\factory('\App\Factories\Controllers\DeleteEducationControllerFactory');
    // Other Certifications
    $container['GetAllOtherCertificationsController'] = DI\factory('\App\Factories\Controllers\GetAllOtherCertificationsControllerFactory');
    $container['AddOtherCertificationController'] = DI\factory('\App\Factories\Controllers\AddOtherCertificationControllerFactory');
    $container['EditOtherCertificationController'] = DI\factory('\App\Factories\Controllers\EditOtherCertificationControllerFactory');
    $container['DeleteOtherCertificationController'] = DI\factory('\App\Factories\Controllers\DeleteOtherCertificationControllerFactory');
    // Hobbies
    $container['GetAllHobbiesController'] = DI\factory('\App\Factories\Controllers\GetAllHobbiesControllerFactory');
    $container['AddHobbyController'] = DI\factory('\App\Factories\Controllers\AddHobbyControllerFactory');
    $container['EditHobbyController'] = DI\factory('\App\Factories\Controllers\EditHobbyControllerFactory');
    $container['DeleteHobbyController'] = DI\factory('\App\Factories\Controllers\DeleteHobbyControllerFactory');
    // About Me
    $container['GetAllAboutMeController'] = DI\factory('\App\Factories\Controllers\GetAllAboutMeControllerFactory');
    $container['AddAboutMeController'] = DI\factory('\App\Factories\Controllers\AddAboutMeControllerFactory');
    $container['EditAboutMeController'] = DI\factory('\App\Factories\Controllers\EditAboutMeControllerFactory');
    $container['DeleteAboutMeController'] = DI\factory('\App\Factories\Controllers\DeleteAboutMeControllerFactory');
    $container['GetOneAboutMeController'] = DI\factory('\App\Factories\Controllers\GetOneAboutMeControllerFactory');

    $containerBuilder->addDefinitions($container);
};
