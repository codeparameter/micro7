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

function add_url_params($newParams){
    $params = $_REQUEST;
    foreach($newParams as $key => $value)
        $params[$key] = $value;
    $query = [];
    foreach($params as $key => $value)
        $query[] = "$key=$value";
    return current_route() . '?' . join('&', $query);
}

function setPage($page){
    return add_url_params(['page' => $page]);
}