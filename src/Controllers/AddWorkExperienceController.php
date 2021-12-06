<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Entities\Validator;
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
                return $this->respondWithJson($response, ['Work experience added!']);
            }
            return $this->respondWithJson($response, ['It broke :( Not added'], 400);
        }
        return $this->respondWithJson($response, ['Check your input! Validation failed :( Not added'], 400);
    }
}