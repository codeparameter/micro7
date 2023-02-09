<?php

function site_url($route){
    return $_ENV['HOST'] . $route;
}