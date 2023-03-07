<?php

function _global($var_name){
    global ${$var_name};
    return ${$var_name};
}

function xss_clean($str){
    return filter_var(htmlspecialchars($str), FILTER_SANITIZE_STRING);
}

function json($data){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die();
}