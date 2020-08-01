<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController.
 */
class IndexController
{
    /**
     * @Route("/", methods={"GET"}, name="index")
     */
    public function index(Request $request): Response
    {
        return new JsonResponse(['ip' => $request->getClientIp()], 200);
    }

    /**
     * @Route("/param/{param}", methods={"GET"}, name="param")
     */
    public function param(Request $request): Response
    {
        return new JsonResponse(['ip' => $request->getClientIp()], 200);
    }
}
