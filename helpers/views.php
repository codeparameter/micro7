<?php

function view($path, $data = []){
    extract($data);
    include_once BASEPATH . "views/$path.php";
}

function stylesheet($path){
    echo '<link rel="stylesheet" href="assets/css/' . $path . '"/>';
}

function script($path){
    echo '<script src="assets/js/' . $path . '"></script>';
}