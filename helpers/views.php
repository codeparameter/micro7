<?php

function view($path, $data = []){
    extract($data);
    include_once BASEPATH . "views/$path.php";
}

function stylesheet($path){
    echo '<link rel="stylesheet" href="' . site_url("assets/css/$path") . '"/>';
}

function script($path){
    echo '<script src="' . site_url("assets/js/$path") . '"></script>';
}