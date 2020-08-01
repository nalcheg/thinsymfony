<?php

declare(strict_types=1);

use App\AnnotatedRouteControllerLoader;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;

require dirname(__DIR__) . '/vendor/autoload.php';

$fileLocator = new FileLocator(__DIR__);

$containerBuilder = new ContainerBuilder();
$loader = new DependencyInjection\Loader\YamlFileLoader(
    $containerBuilder, $fileLocator
);
$loader->load(__DIR__ . '/../config/services.yaml');


$controllersAnnotationLoader = new AnnotationDirectoryLoader(
    new FileLocator(__DIR__ . '/../src/Controller/'),
    new AnnotatedRouteControllerLoader(
        new AnnotationReader()
    )
);

$routes = $controllersAnnotationLoader->load(__DIR__ . '/../src/Controller/');
$containerBuilder->setParameter('routes', $routes);

$containerBuilder->compile(true);

return $containerBuilder;
