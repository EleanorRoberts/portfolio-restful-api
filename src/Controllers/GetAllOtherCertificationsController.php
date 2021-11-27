<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\OtherCertificationsModel;
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
        $otherCertifications = $this->model->getAllOtherCertifications();
        return $this->respondWithJson($response, $otherCertifications);
    }
}