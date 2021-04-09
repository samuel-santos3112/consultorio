<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OlaMundoController
{

    /**
     * @Route("/ola")
     *
     * @return JsonResponse
     */
    public function olaMundoAction()
    {
        return new JsonResponse("Olá mundo");

    }

}