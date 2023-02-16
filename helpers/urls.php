<?php

function site_url($route){
    return $_ENV['HOST'] . $route;
}

function current_url(){
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function current_route(){
    return strtok($_SERVER['REQUEST_URI'], '?');
}