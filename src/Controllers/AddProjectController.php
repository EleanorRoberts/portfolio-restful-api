<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
use App\Models\ProjectsModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddProjectController extends Controller
{
    protected ProjectsModel $model;

    public function __construct(ProjectsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateAddProject($data)) {
            $attempt = $this->model->addProject($data['name'], $data['about'], ($data['githubLink'] ?? null), $data['liveVersion'] ?? null);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Project added!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('It broke :( Not added', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not added', false), 400);
    }
}