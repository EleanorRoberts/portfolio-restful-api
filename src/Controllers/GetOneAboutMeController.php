<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AboutMeModel;
use App\Services\FormatResponse;
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
            if ($field['name'] !== 'id') {
                $arrayOfFields[] = $field['name'];
            }
        }
        if (in_array($args['name'], $arrayOfFields)) {
            $attempt = $this->model->getOneAboutMe($args['name']);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved about me!', true, $attempt));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault("There's no about me with that name!", false), 404);
    }
}