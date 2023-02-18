<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;

class Welcome implements MiddlewareInterface{
    public function handle(){
        nice_dump("welcome");
    }
}