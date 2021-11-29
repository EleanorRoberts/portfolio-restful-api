<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditAboutMeController extends Controller
{
    protected AboutMeModel $model;

    public function __construct(AboutMeModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        // Sort this out!
        $attempt = $this->model->editAboutMe($data);
        if ($attempt) {
            return $this->respondWithJson($response, ['About me updated!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not updated', $attempt], 400);
    }
}