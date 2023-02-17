<?php

function view($path, $data = []){
    extract($data);
    include_once BASEPATH . "views/$path.php";
}