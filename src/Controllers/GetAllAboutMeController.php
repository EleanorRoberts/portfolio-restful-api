<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllAboutMeController extends Controller
{
    protected AboutMeModel $model;

    public function __construct(AboutMeModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->getAllAboutMe();
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved all about me!', true, $attempt));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
    }
}