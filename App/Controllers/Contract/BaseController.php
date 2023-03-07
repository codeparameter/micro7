<?php

namespace App\Controllers\Contract;;

abstract class BaseController{

    protected $request;

    public function __construct()
    {
        $this->request = _global('request');
    }
}