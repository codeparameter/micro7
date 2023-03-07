<?php

namespace App\Middleware;

use App\Middleware\Contract\BaseMiddleware;

class GlobalMiddleware extends BaseMiddleware{

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(){
        $this->sanitizeParams();
    }

    public function sanitizeParams(){
        $params = [];
        foreach($this->request->getParams() as $key => $value)
            $params[$key] = xss_clean($value);
        $this->request->setParams($params);
    }
}