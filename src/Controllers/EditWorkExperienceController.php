<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
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
        if (Validator::validateEditWorkExperience($data)) {
            $attempt = $this->model->editWorkExperience($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Work experience updated!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not updated', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not updated', false), 400);
    }
}