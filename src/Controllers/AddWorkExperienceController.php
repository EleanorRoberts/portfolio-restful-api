<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
use App\Models\WorkExperienceModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddWorkExperienceController extends Controller
{
    protected WorkExperienceModel $model;

    public function __construct(WorkExperienceModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateAddWorkExperience($data)) {
            $attempt = $this->model->addWorkExperience($data['company'], $data['position'], ($data['startDate'] ?? null), ($data['leaveDate'] ?? null));
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Work experience added!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('It broke :( Not added', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not added', false), 400);
    }
}