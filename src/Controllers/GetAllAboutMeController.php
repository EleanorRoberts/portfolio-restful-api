<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
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
        $aboutMe = $this->model->getAllAboutMe();
        return $this->respondWithJson($response, ['About me added!'], $aboutMe);
    }
}