<?php

namespace App\Core\Routing;

class Route{

    private static $routes = [];

    public static function add($methods, $uri, $action = null, $middleWares = []){
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ["methods" => $methods, "uri" => $uri, "action" => $action, "middleWares" => $middleWares];
    }

    public static function get($uri, $action = null, $middleWares = []){
        self::add('get', $uri, $action, $middleWares);
    }

    public static function post($uri, $action = null, $middleWares = []){
        self::add('post', $uri, $action, $middleWares);
    }

    public static function delete($uri, $action = null, $middleWares = []){
        self::add('delete', $uri, $action, $middleWares);
    }

    public static function put($uri, $action = null, $middleWares = []){
        self::add('put', $uri, $action, $middleWares);
    }

    public static function patch($uri, $action = null, $middleWares = []){
        self::add('patch', $uri, $action, $middleWares);
    }

    public static function options($uri, $action = null, $middleWares = []){
        self::add('options', $uri, $action, $middleWares);
    }

    public static function routes(){
        return self::$routes;
    }

}
