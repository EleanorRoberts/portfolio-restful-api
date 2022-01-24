<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\HobbiesModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllHobbiesController extends Controller
{
    protected HobbiesModel $model;

    public function __construct(HobbiesModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->getAllHobbies();
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved all hobbies!', true, $attempt));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
    }
}