<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\WorkExperienceModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditWorkExperienceController extends Controller
{
    protected WorkExperienceModel $model;

    public function __construct(WorkExperienceModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $attempt = $this->model->editWorkExperience($args['id'], $data);
        if ($attempt) {
            return $this->respondWithJson($response, ['Work experience updated!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not updated'], 400);
    }
}