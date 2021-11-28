<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\WorkExperienceModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddWorkExperienceController extends Controller
{
    protected WorkExperienceModel $model;

    public function __construct(WorkExperienceModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->addWorkExperience($args['company'], $args['position'], $args['startDate'], $args['leaveDate']);
        if ($attempt) {
            return $this->respondWithJson($response, ['Work experience added!']);
        }
        return $this->respondWithJson($response, ['It broke :( Not added'], 400);
    }
}