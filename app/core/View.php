<?php

namespace App\Core;

class View
{
    public $layout = 'app';
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render($view, $data = [])
    {
        extract($data);
        ob_start();
        $path ='App/Views/' . $view . '.php';
        if (file_exists($path)) {
            require_once $path;
        } else {
            $this::errors(404);
        }
        $content = ob_get_clean();
        require_once 'App/Views/Layouts/' . $this->layout . '.php';
    }

    public static function errors($code)
    {
        http_response_code($code);
        $path ='App/Views/Errors/' . $code . '.php';
        if (file_exists($path)){
            require_once $path;
        }
        exit;
    }

    public static function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }
}