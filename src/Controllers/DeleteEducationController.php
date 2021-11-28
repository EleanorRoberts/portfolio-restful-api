<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\EducationModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteEducationController extends Controller
{
    protected EducationModel $model;

    public function __construct(EducationModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->deleteEducation($args['id']);
        if ($attempt) {
            return $this->respondWithJson($response, ['Work experience removed!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not removed'], 400);
    }
}