<?php

namespace App\Middleware\Contract;

abstract class BaseMiddleware implements MiddlewareInterface{

    protected $request;

    public function __construct()
    {
        $this->request = _global('request');
    }
}