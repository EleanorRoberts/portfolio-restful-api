<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Entities\Validator;
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
        if (Validator::validateEditAboutMe($data)) {
            $attempt = $this->model->editAboutMe($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, ['About me updated!']);
            }
            return $this->respondWithJson($response, ['Something broke :( Not updated'], 400);
        }
        return $this->respondWithJson($response, ['Check your input! Validation failed :( Not updated'], 400);
    }
}