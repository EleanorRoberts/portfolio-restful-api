<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
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
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Education updated!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not updated', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not updated', false), 400);
    }
}