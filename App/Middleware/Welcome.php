<?php

namespace App\Middleware;

use App\Middleware\Contract\BaseMiddleware;

class Welcome extends BaseMiddleware{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle(){
        nice_dump("welcome");
    }
}