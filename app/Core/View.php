<?php

namespace App\Core;

class View
{
    public static function render(string $view, array $data = [])
    {
        $path = __DIR__ . '/../Views/' . $view . '.php';

        if(!file_exists($path)){
            throw new \Exception("View {$view} not found");
        }

        extract ($data, EXTR_SKIP);
        include $path;
    }
}