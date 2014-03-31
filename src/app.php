<?php

//Require Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

//Create Silex application
$app = new Silex\Application();

//Register Middleware
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

//Routes
$app->get('/', function() use($app) {

    return $app['twig']->render('index.html.twig');

});