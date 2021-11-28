<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\HobbiesModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddHobbyController extends Controller
{
    protected HobbiesModel $model;

    public function __construct(HobbiesModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $attempt = $this->model->addHobby($data['name']);
        if ($attempt) {
            return $this->respondWithJson($response, ['Work experience added!']);
        }
        return $this->respondWithJson($response, ['It broke :( Not added'], 400);
    }
}