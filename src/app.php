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
require_once __DIR__ . '/routes.php';

//////////////////////////////////////////////////////////////
//----------------------- FUNCTIONS ----------------------- //
//////////////////////////////////////////////////////////////

function to_rand_ascii($chr){
    switch (mt_rand(1, 3)) {
    case 1:
        return "&#" . ord($chr) . ";";
        break;
    case 2:
        return "&#000" . ord($chr) . ";";
        break;
    default:
        return "&#x" . dechex(ord($chr)) . ";";
    }
}

function mungemail($str_email, $str_display = null, $bln_link = true){

    $str_mailto = '';
    $str_encoded_email = '';

    for ($i = 0; $i < strlen($str_email); $i++) {
        $str_encoded_email .= to_rand_ascii(substr($str_email, $i));
    }
    if (strlen(trim($str_display)) > 0) {
        $str_display = $str_display;
    } else {
        $str_display = $str_encoded_email;
    }
    for ($i = 0; $i < strlen('mailto:'); $i++) {
        $str_mailto .= to_rand_ascii(substr('mailto:', $i, 1));
    }
    return '<a href="mailto:'.$str_display.'">'.$str_display.'</a>';
}

/////////////////////////////////////////////////////////////
//---------------------- EXTENSIONS ---------------------- //
/////////////////////////////////////////////////////////////
$function = new Twig_SimpleFunction('safemail', 'mungemail');

$app['twig']->addFunction($function);