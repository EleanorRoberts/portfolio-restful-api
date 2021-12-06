<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Entities\Validator;
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
                return $this->respondWithJson($response, ['Project updated!']);
            }
            return $this->respondWithJson($response, ['Something broke :( Not updated'], 400);
        }
        return $this->respondWithJson($response, ['Check your input! Validation failed :( Not updated'], 400);
    }
}