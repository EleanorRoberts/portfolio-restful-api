<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
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
        if (Validator::validateAddOtherCertification($data)) {
            $attempt = $this->model->addOtherCertification($data['name'], $data['certifier'], ($data['dateAchieved'] ?? null));
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Other certification added!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('It broke :( Not added', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not added', false), 400);
    }
}