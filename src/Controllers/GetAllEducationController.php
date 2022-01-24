<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\EducationModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllEducationController extends Controller
{
    protected EducationModel $model;

    public function __construct(EducationModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->getAllEducation();
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved all education!', true, $attempt));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
    }
}