<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetOneAboutMeController extends Controller
{
    protected AboutMeModel $model;

    public function __construct(AboutMeModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $fields = $this->model->getAboutMeFields();
        $arrayOfFields = [];
        foreach ($fields as $field) {
            $arrayOfFields[] = $field['Field'];
        }
        if (in_array($args['field'], $arrayOfFields)) {
            $aboutMe = $this->model->getOneAboutMe($args['field']);
            return $this->respondWithJson($response, $aboutMe);
        }
        return $this->respondWithJson($response, [], 404);
    }
}