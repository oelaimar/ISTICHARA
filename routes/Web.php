<?php

use App\Core\Router;

$router = new Router();

$routes = [
    '/' => ["callable" => 'App\\Controllers\\HomeController::index', "method" => ['GET', 'POST'],],
    '/user' => ["callable" => 'App\\Controllers\\UserController::index', "method" => ['GET', 'POST'],],
];

$uri = $_SERVER["REQUEST_URI"] ?? '/';
$uri = explode('?', $uri)[0];

if(array_key_exists($uri, $routes)){
    $router->get($uri, $routes[$uri]);
    $router->dispatch($uri);
}