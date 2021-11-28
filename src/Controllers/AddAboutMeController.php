<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
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
        $attempt = $this->model->addAboutMe($data['company'], $data['position'], $data['startDate'], $data['leaveDate']);
        if ($attempt) {
            return $this->respondWithJson($response, ['About me added!']);
        }
        return $this->respondWithJson($response, ['It broke :( Not added'], 400);
    }
}