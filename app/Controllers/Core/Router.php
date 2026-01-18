<?php
namespace App\Controllers\Core;

class Router
{
    private array $routes = [];
    public function get($uri, $option): void
    {
        $this->routes["GET"][$uri] = $option;
    }
    public function post($uri, $option): void
    {
        $this->routes["POST"][$uri] = $option;
    }
    public function dispatch($uri): void
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $options = $this->routes[$requestMethod][$uri] ?? false;


        if(!$options) {
            echo "error 404";
            exit();
        }

        $callable = $options['callable'];
        $method = $options['method'];

        if(!in_array($requestMethod, $method)){
            echo "error 404";
            exit();
        }


        $controller = explode('::', $callable)[0];
        $method = explode('::', $callable)[1];

        $params = [];
        call_user_func([new $controller(), $method], $params);
    }
}