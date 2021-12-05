<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\OtherCertificationsModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddOtherCertificationController extends Controller
{
    protected OtherCertificationsModel $model;

    public function __construct(OtherCertificationsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        // Add in logic to determine if certifier and date_achieved have been passed in
        $attempt = $this->model->addOtherCertification($data['name'], $data['certifier'], $data['dateAchieved']);
        if ($attempt) {
            return $this->respondWithJson($response, ['Other certification added!']);
        }
        return $this->respondWithJson($response, ['It broke :( Not added'], 400);
    }
}