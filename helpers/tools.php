<?php

function _global($var_name){
    global ${$var_name};
    return ${$var_name};
}

function parseToInt($num){
    return (int)$num;
}

function xss_clean($str){
    return filter_var(htmlspecialchars($str), FILTER_SANITIZE_STRING);
}

function json($data){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die();
}

function jsonHeader($status, $message = '', $data = []){
    json(
        array_merge(
            ['status' => $status, 'message' => $message], $data
        )
    );
}