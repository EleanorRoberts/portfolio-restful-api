<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\OtherCertificationsModel;
use App\Services\FormatResponse;
use App\Validator\Validator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class TestingController extends Controller
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, Array $args): ResponseInterface
    {
        return $this->respondWithJson($response, FormatResponse::convertToDefault('Testing validation', true, ['validateProject' => Validator::validateAddProject([
            'name' => 'Potato',
            'about' => 'I love potatoes they are a wonderful vegetable and they taste so good is so many varied ways',
            'githubLink' => 'www.github.co.uk/Nova-is-the-bestest?yes-she-is',
            'liveVersion' => 'www.github.co.uk/Nova-is-the-bestest?yes-she-is'
        ])]));
    }
}