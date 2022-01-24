<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
use App\Models\ProjectsModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditProjectController extends Controller
{
    protected ProjectsModel $model;

    public function __construct(ProjectsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateEditProject($data)) {
            $attempt = $this->model->editProject($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Project updated!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not updated', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not updated', false), 400);
    }
}