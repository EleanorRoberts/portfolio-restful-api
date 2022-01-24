<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Validator\Validator;
use App\Models\AboutMeModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddAboutMeController extends Controller
{
    protected AboutMeModel $model;

    public function __construct(AboutMeModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateAddAboutMe($data)) {
            $attempt = $this->model->addAboutMe($data['name'], $data['description']);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('About me added!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('It broke :( Not added', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not added', false), 400);
    }
}