<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Entities\Validator;
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
        if (Validator::validateEditEducation($data)) {
            $attempt = $this->model->editEducation($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, ['Education updated!']);
            }
            return $this->respondWithJson($response, ['Something broke :( Not updated'], 400);
        }
        return $this->respondWithJson($response, ['Check your input! Validation failed :( Not updated'], 400);
    }
}