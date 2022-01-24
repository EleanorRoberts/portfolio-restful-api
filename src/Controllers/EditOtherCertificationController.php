<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\FormatResponse;
use App\Validator\Validator;
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
        if (Validator::validateEditOtherCertification($data)) {
            $attempt = $this->model->editOtherCertification($args['id'], $data);
            if ($attempt) {
                return $this->respondWithJson($response, FormatResponse::convertToDefault('Other certification updated!'));
            }
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Something broke :( Not updated', false), 400);
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Check your input! Validation failed :( Not updated', false), 400);
    }
}