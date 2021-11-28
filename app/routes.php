<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/work-experience', 'GetAllWorkExperienceController');
    $app->post('/work-experience', 'AddWorkExperienceController');
    $app->get('/education', 'GetAllEducationController');
    $app->get('/projects', 'GetAllProjectsController');
    $app->get('/other-certifications', 'GetAllOtherCertificationsController');
    $app->get('/hobbies', 'GetAllHobbiesController');
    $app->get('/about-me', 'GetAllAboutMeController');
    $app->get('/about-me/{field}', 'GetOneAboutMeController');


};
