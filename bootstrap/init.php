<?php

function include_all($route){
    foreach(glob($route . '/*php') as $filename)
        include $filename;
}

define('BASEPATH', __DIR__ . "/../");

include BASEPATH . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

include_all(BASEPATH . "/helpers");

use App\Core\Request;
$request = new Request();