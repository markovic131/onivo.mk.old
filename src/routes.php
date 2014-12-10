<?php

// $app->get('/login', function() use($app) {
//     header('Location: https://app.onivo.mk', true, 301);
//     die;
// });

// $app->get('/register', function() use($app) {
//     header('Location: https://app.onivo.mk/register', true, 301);
//     die;
// });

$app->get('/faq', function() use ($app) {
    return $app['twig']->render('faq.twig');
});

$app->get('/save-trees', function() use ($app) {
    return $app['twig']->render('trees.twig');
});

$app->get('/terms-of-service', function() use($app) {
    return $app['twig']->render('terms.twig');
});

$app->get('/privacy-policy', function() use($app) {
    return $app['twig']->render('privacy.twig');
});

// $app->get('/feature/{page}', function($page) use($app) {

//     $twigViewPath   = $app['twig.path'] . "/";
//     $featuresFolder = "_pages/_features/";
//     $requestedFile  = $page . ".twig";

//     if(!file_exists($twigViewPath . $featuresFolder . $requestedFile)) {

//         throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//     }

//     return $app['twig']->render($featuresFolder.$requestedFile);

// });

$app->get('/', function() use($app) {
    return $app['twig']->render('index.twig');
});