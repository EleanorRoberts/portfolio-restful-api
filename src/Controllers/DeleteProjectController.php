<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\ProjectsModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteProjectController extends Controller
{
    protected ProjectsModel $model;

    public function __construct(ProjectsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->deleteProject($args['id']);
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Project removed!'));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not removed', false), 400);
    }
}