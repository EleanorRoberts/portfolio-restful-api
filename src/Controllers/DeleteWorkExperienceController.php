<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\WorkExperienceModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteWorkExperienceController extends Controller
{
    protected WorkExperienceModel $model;

    public function __construct(WorkExperienceModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->deleteWorkExperience($args['id']);
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Work experience removed!'));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not removed', false), 400);
    }
}