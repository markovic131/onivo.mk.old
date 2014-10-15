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

$app->get('/terms-of-service', function() use($app) {
    return $app['twig']->render('terms.twig');
});

$app->get('/privacy-policy', function() use($app) {
    return $app['twig']->render('privacy.twig');
});

$app->get('/', function() use($app) {
    return $app['twig']->render('index.twig');
});