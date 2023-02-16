<?php

function nice_dump($var, $style = ''){
    echo "<pre style='border: 1px solid orange; border-radius: 8px; display: block; padding: 10px; border-left-width: 5px; " . $style . "'>";
    var_dump($var);
    echo "</pre>";
}

function nice_dd($var, $msg, $sdu = '', $sdi = 'border-color: red;'){
    nice_dump($var, $sdu);
    nice_dump($msg, $sdi);
    die();
}