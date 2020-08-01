<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernel;

require dirname(__DIR__) . '/vendor/autoload.php';

/** @var ContainerInterface $containerBuilder */
$containerBuilder = require dirname(__DIR__) . '/config/container.php';

/** @var HttpKernel $kernel */
$kernel = $containerBuilder->get('http_kernel');

$request = Request::createFromGlobals();

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
