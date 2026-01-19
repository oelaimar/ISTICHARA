<?php

use App\Controllers\Core\Router;

$router = new Router();

$routes = [
    '/' => ["callable" => 'App\\Controllers\\HomeController::index', "method" => ['GET', 'POST'],],
    '/create' => ["callable" => 'App\\Controllers\\CreateController::index', "method" => ['GET', 'POST'],],
    '/search' => ["callable" => 'App\\Controllers\\SearchController::index', "method" => ['GET', 'POST'],],

];

$uri = $_SERVER["REQUEST_URI"] ?? '/';
$uri = explode('?', $uri)[0];

foreach ($routes as $path => $config) {
    if (in_array('GET', $config['method'])) {
        $router->get($path, $config);
    }
    if (in_array('POST', $config['method'])) {
        $router->post($path, $config);
    }
}

$router->dispatch($uri);