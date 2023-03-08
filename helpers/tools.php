<?php

function _global($var_name)
{
    global ${$var_name};
    return ${$var_name};
}

function parseToInt($num)
{
    return (int)$num;
}

function xss_clean_string($str)
{
    return filter_var(htmlspecialchars($str), FILTER_SANITIZE_STRING);
}

function xss_clean_array($stringArray){
    if(count($stringArray) != 1)
        return null;
    return array_map('xss_clean_string', explode(',', $stringArray[0]));
}

function xss_clean($value)
{
    return is_array($value) ?
        xss_clean_array($value) : xss_clean_string($value);
}

function json($data)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die();
}

function jsonHeader($status, $message = '', $data = [])
{
    json(
        array_merge(
            ['status' => $status, 'message' => $message],
            $data
        )
    );
}
