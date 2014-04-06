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
    if ($e instanceof Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {

        return $app['twig']->render('_errors/404.twig');
    }
    return $app['twig']->render('_errors/500.twig');
});

//Routes
$app->get('/login', function() use($app) {
    header('Location: http://app.onivo.mk/login?lang=mk', true, 301);
    die;
});
$app->get('/register', function() use($app) {
    header('Location: http://app.onivo.mk/register?lang=mk', true, 301);
    die;
});

$app->get('/terms-of-service', function() use($app) {
    return $app['twig']->render('terms.twig');
});

$app->get('/privacy-policy', function() use($app) {
    return $app['twig']->render('privacy.twig');
});

$app->get('/', function() use($app) {
    return $app['twig']->render('index.twig');
});