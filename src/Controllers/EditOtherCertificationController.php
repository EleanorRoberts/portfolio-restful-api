<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\OtherCertificationsModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EditOtherCertificationController extends Controller
{
    protected OtherCertificationsModel $model;

    public function __construct(OtherCertificationsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $attempt = $this->model->editOtherCertification($args['id'], $data);
        if ($attempt) {
            return $this->respondWithJson($response, ['Other certification updated!']);
        }
        return $this->respondWithJson($response, ['Something broke :( Not updated', $attempt], 400);
    }
}