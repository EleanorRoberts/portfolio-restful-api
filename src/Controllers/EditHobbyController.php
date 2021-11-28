<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\HobbiesModel;
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
        $attempt = $this->model->editHobby($args['id'], $data);
        if ($attempt) {
            return $this->respondWithJson($response, ['Hobby updated!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not updated', $attempt], 400);
    }
}