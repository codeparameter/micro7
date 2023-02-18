<?php

function include_all($route){
    foreach(glob($route . '/*php') as $filename)
        include $filename;
}

define('BASEPATH', __DIR__ . "/../");
define('BASECONTROLLER', '\App\Controllers\\');
define('BASEMIDDLEWARE', '\App\Middleware\\');

include BASEPATH . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

use App\Core\Request;
$request = new Request();

include_all(BASEPATH . "/helpers");
include BASEPATH . "/routes/web.php";