<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\HobbiesModel;
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
        $workExperience = $this->model->getAllHobbies();
        return $this->respondWithJson($response, $workExperience);
    }
}