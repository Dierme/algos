<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 31.10.17
 * Time: 17:37
 */

class Router{

    protected $routes = [
        'GET'   =>  [],
        'POST'  =>  []
    ];

    public static function load($file){
        $router = new static;

        require $file;

        return $router;

    }

    public function get($uri, $controller){
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller){
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $method){
        if(array_key_exists($uri, $this->routes[$method])){
            return $this->routes[$method][$uri];
        }

        throw new Exception('no route defined');
    }
}