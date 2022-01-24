<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\WorkExperienceModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllWorkExperienceController extends Controller
{
    protected WorkExperienceModel $model;

    public function __construct(WorkExperienceModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->getAllWorkExperience();
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved all work experience!', true, $attempt));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
    }
}