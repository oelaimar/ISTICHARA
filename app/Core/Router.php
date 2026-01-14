<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get($uri, $callback)
    {
        $this->routes["GET"][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes["POST"][$uri] = $callback;
    }

    public function resolve()
    {
        $uri = $_SERVER["REQUEST_URI"] ?? '/';
        $uri = explode('?', $uri)[0];

        $method = $_SERVER["REQUEST_METHOD"];

        $callback = $this->routes[$method][$uri] ?? false;

        if(!$callback){
            echo "404 - page not found";
            return;
        }

        if(is_callable($callback)){
            return $callback();
        }
    }

}