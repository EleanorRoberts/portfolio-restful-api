<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();



    // Work experience
    $app->get('/work-experience', 'GetAllWorkExperienceController');
    $app->post('/work-experience', 'AddWorkExperienceController');
    $app->put('/work-experience/{id}', 'EditWorkExperienceController');
    $app->delete('/work-experience/{id}', 'DeleteWorkExperienceController');
    // Projects
    $app->get('/projects', 'GetAllProjectsController');
    $app->post('/projects', 'AddProjectController');
    $app->put('/projects/{id}', 'EditProjectController');
    $app->delete('/projects/{id}', 'DeleteProjectController');
    // Education
    $app->get('/education', 'GetAllEducationController');
    $app->post('/education', 'AddEducationController');
    $app->put('/education/{id}', 'EditEducationController');
    $app->delete('/education/{id}', 'DeleteEducationController');
    // Other Certifications
    $app->get('/other-certifications', 'GetAllOtherCertificationsController');
    $app->post('/other-certifications', 'AddOtherCertificationController');
    $app->put('/other-certifications/{id}', 'EditOtherCertificationController');
    $app->delete('/other-certifications/{id}', 'DeleteOtherCertificationController');
    // Hobbies
    $app->get('/hobbies', 'GetAllHobbiesController');
    $app->post('/hobbies', 'AddHobbyController');
    $app->put('/hobbies/{id}', 'EditHobbyController');
    $app->delete('/hobbies/{id}', 'DeleteHobbyController');
    // About Me
    $app->get('/about-me', 'GetAllAboutMeController');
    $app->post('/about-me', 'AddAboutMeController');
    $app->put('/about-me/{id}', 'EditAboutMeController');
    $app->delete('/about-me/{id}', 'DeleteAboutMeController');
    $app->get('/about-me/{name}', 'GetOneAboutMeController');

    // Testing
//    $app->get('/testing', 'TestingController');
};
