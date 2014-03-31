<?php

//Require Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

//Create Silex application
$app = new Silex\Application();

//Register Middleware
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

//Error Handlers
$app->error(function (\Exception $e) use ($app) {

    if ($e instanceof NotFoundHttpException) {

        return $app['twig']->render('_errors/404.html.twig');

    }

    $code = ($e instanceof HttpException) ? $e->getStatusCode() : 500;

    return $app['twig']->render('_errors/404.html.twig', ['code' => $code]);
});

//Routes
$app->get('/terms', function() use($app) {
    return $app['twig']->render('terms.html.twig');
});

$app->get('/privacy', function() use($app) {
    return $app['twig']->render('privacy.html.twig');
});

$app->get('/', function() use($app) {
    return $app['twig']->render('index.html.twig');
});