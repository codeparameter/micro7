<?php

namespace App\Core\Routing;

class Router{

    private static $request;
    private static $flag405 = false;

    private static function dispatch($action, $matches){
        if(is_callable($action)){
            $action(...$matches);
            die();
        }
        
        if(is_string($action))
            $action = explode('@', $action);

        if(is_array($action)){
            $class_name = BASECONTROLLER . $action[0] . "Controller";
            if(!class_exists($class_name))
                nice_dd($class_name, "given class name does'nt exist");

            $controller = new $class_name();

            $method = $action[1];
            if(!method_exists($controller, $method))
                nice_dd($method, "given method name does'nt exist");

            $controller->{$method}(...$matches);

            die();
        }

        nice_dd($action, "action must be string or array or function");
    }

    private static function dispatch404(){
        header("HTTP/1.0 404 Not Found");
        view("errors/404");
        die();
    }

    private static function dispatch405(){
        header("HTTP/1.0 405 Method Not Allowed"); 
        view("errors/405");
        die();
    }

    private static function match($route){
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-$\w]+)'], $route['uri']) . "$/";

        if(!preg_match($pattern, current_route(), $matches))
            return;

        if(!in_array(self::$request->method(), $route['methods'])){
            self::$flag405 = true;
            return;
        }

        if(is_null($route['action']) || empty($route['action']))
            nice_dd($route['action'], "action of this route is empty");
        

        $matches = array_filter($matches, function($k){ return !is_int($k); }, ARRAY_FILTER_USE_KEY);

        array_unshift($route['middleWares'] , 'GlobalMiddleware');

        foreach($route['middleWares'] as $middleWare){
            $middleWare_class = BASEMIDDLEWARE . $middleWare;
            $mid = new $middleWare_class();
            $mid->handle();
        }

        self::dispatch($route['action'], $matches);
    }

    public static function find(){
        self::$request = _global('request');
        array_map('self::match', Route::routes());
        if(self::$flag405)
            self::dispatch405();
        self::dispatch404();
    }

}
