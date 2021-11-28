<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\EducationModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditEducationController extends Controller
{
    protected EducationModel $model;

    public function __construct(EducationModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $attempt = $this->model->editEducation($args['id'], $data);
        if ($attempt) {
            return $this->respondWithJson($response, ['Education updated!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not updated', $attempt], 400);
    }
}