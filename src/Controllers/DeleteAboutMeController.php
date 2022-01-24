<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteAboutMeController extends Controller
{
    protected AboutMeModel $model;

    public function __construct(AboutMeModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->deleteAboutMe($args['id']);
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('About me removed!'));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not removed', false), 400);
    }
}