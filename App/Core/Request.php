<?php

namespace App\Core;

class Request{

    private $agent;
    private $ip;
    private $method;
    private $params;

    public function __construct()
    {
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->params = $_REQUEST;
    }

    public function agent(){
        return $this->agent;
    }

    public function ip(){
        return $this->ip;
    }

    public function method(){
        return $this->method;
    }

    public function params(){
        return $this->params;
    }

    public function param($key){
        return $this->params[$key] ?? null;
    }

    public function isset($key){
        return isset($this->params[$key]);
    }

    public function redirect($route){
        header("Location: " . site_url($route));
        die();
    }
}