<?php

use App\Middlewares\Auth;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$router->group( '/', function (\League\Route\RouteGroup $router) use ($container) {
	$router->map( 'GET', '/', [App\Controllers\HomeController::class, 'index']);
	$router->map( 'GET', '/user/{id}', [App\Controllers\HomeController::class, 'findUser']);
	$router->map( 'GET', '/user_random', [App\Controllers\HomeController::class, 'randomUser']);
	$router->map( 'GET', '/user/{id}/posts', [App\Controllers\HomeController::class, 'userPosts']);
	$router->map( 'GET', '/users', [App\Controllers\HomeController::class, 'users']);
	$router->map( 'GET', '/profile/{name}/{age}', [App\Controllers\ProfileController::class, 'index'])
		->middleware($container->get(Auth::class));

// 	$router->map('GET', '/config', function (ServerRequestInterface $request, array $args) {
//      $response = new Zend\Diactoros\Response();
// 		$driver = config('environment', 'type');
// 		$response->getBody()->write("<h1>{$driver}</h1>");
// 		return $response;
// 	});
});
