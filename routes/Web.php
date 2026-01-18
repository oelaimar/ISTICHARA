<?php

use App\Controllers\Core\Router;

$router = new Router();

$routes = [
    '/' => ["callable" => 'App\\Controllers\\HomeController::index', "method" => ['GET', 'POST'],],
    '/create' => ["callable" => 'App\\Controllers\\CreateController::index', "method" => ['GET', 'POST'],],
];

$uri = $_SERVER["REQUEST_URI"] ?? '/';
$uri = explode('?', $uri)[0];

if(array_key_exists($uri, $routes)){
    $router->get($uri, $routes[$uri]);
    $router->dispatch($uri);
}