<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\EducationModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllEducationController extends Controller
{
    protected EducationModel $model;

    public function __construct(EducationModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $workExperience = $this->model->getAllEducation();
        return $this->respondWithJson($response, $workExperience);
    }
}