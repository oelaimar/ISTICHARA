<?php

use App\Core\Router;

require __DIR__ . "/../vendor/autoload.php";

$router = new Router();

$router->get('/', function(){
    echo "test home page (index)";
});

$router->get('/helloWord', function (){
   echo "test for a page";
});

$router->resolve();