<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/work-experience', 'GetAllWorkExperienceController');
    $app->get('/education', 'GetAllEducationController');
    $app->get('/projects', 'GetAllProjectsController');
    $app->get('/other-certifications', 'GetAllOtherCertificationsController');


};
