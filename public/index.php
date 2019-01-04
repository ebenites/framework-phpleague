<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Base Path
define('BASE_PATH', __DIR__ . '/..//');

// Start Session
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// Autoload Vendors
require __DIR__ . '/../vendor/autoload.php';

// Load .env: https://github.com/vlucas/phpdotenv
$dotEnv = Dotenv\Dotenv::create(BASE_PATH);
$dotEnv->load();

// Kint::dump( getenv('DB_NAME') );

// Containers
$container = new League\Container\Container();

// Enable auto wiring: http://container.thephpleague.com/3.x/auto-wiring/
$container->delegate(
    new League\Container\ReflectionContainer
    // (new League\Container\ReflectionContainer)->cacheResolutions()
);

// Services Providers
// $container->addServiceProvider(new App\Providers\SessionServiceProvider());
// $container->addServiceProvider(new App\Providers\ViewServiceProvider());
$container->addServiceProvider(new App\Providers\DatabaseServiceProvider);

// Kint::dump( $container->get(\App\Services\Session::class) );
// Kint::dump( $container->get(\App\Services\View::class) );

// Middleware
// $container->add(App\Middlewares\Auth::class)->addArgument($container->get(App\Services\Session::class));

// Request & Response
// $container->add('response', Zend\Diactoros\Response::class);
// $container->add('request', function () {
// 	return Zend\Diactoros\ServerRequestFactory::fromGlobals(
// 		$_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
// 	);
// });

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

// Kint::dump( $container->get('request') );
// Kint::dump( $container->get('response') );

// Router: http://route.thephpleague.com/4.x/dependency-injection/
$strategy = (new League\Route\Strategy\ApplicationStrategy)->setContainer($container);
$router   = (new League\Route\Router)->setStrategy($strategy);

require_once BASE_PATH . 'app/routes.php';

// Kint::dump( $router );

// Response Dispatcher: http://route.thephpleague.com/4.x/usage/
$response = $router->dispatch($request);

$emitter = new Zend\Diactoros\Response\SapiEmitter;
$emitter->emit($response);
