<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
use App\Models\HobbiesModel;
use phpDocumentor\Reflection\Types\False_;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditHobbyController extends Controller
{
    protected HobbiesModel $model;

    public function __construct(HobbiesModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        if (Validator::validateEditHobby($data)) {
            $attempt = $this->model->editHobby($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Hobby updated!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not updated', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault()('Check your input! Validation failed :( Not updated', false), 400);
    }
}