<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Entities\Validator;
use App\Models\EducationModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddEducationController extends Controller
{
    protected EducationModel $model;

    public function __construct(EducationModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateAddEducation($data)) {
            $attempt = $this->model->addEducation($data['level'], $data['institution'], ($data['grade'] ?? null), ($data['startDate'] ?? null), ($data['endDate'] ?? null));
            if ($attempt) {
                return $this->respondWithJson($response, ['Education added!']);
            }
            return $this->respondWithJson($response, ['It broke :( Not added'], 400);
        }
        return $this->respondWithJson($response, ['Check your input! Validation failed :( Not added'], 400);
    }
}