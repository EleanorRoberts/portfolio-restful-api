<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\OtherCertificationsModel;
use App\Services\FormatResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetAllOtherCertificationsController extends Controller
{
    protected OtherCertificationsModel $model;

    public function __construct(OtherCertificationsModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        $attempt = $this->model->getAllOtherCertifications();
        if ($attempt) {
            return $this->respondWithJson($response, FormatResponse::convertToDefault('Retrieved all other certifications!', true, $attempt));
        }
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Something went wrong!', false));
    }
}