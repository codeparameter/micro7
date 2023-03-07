<?php

namespace App\Models\Contracts;

abstract class BaseModel implements CrudInterface{
    protected $connection;
    protected $table;
    protected $primaryKey = 'id';
    protected $pageSize = 10;
    protected $attrs = [];
    protected $request;

    public function __construct()
    {
        $this->request = _global('request');
    }

    public function getAttr($key)
    {
        if(!$key || !array_key_exists($key, $this->attrs))
            return null;
        return $this->attrs[$key];
    }

    public function getAttrs(){
        return $this->attrs;
    }

    public function __get($key)
    {
        return $this->getAttr($key);
    }

    public function __set($key, $val)
    {
        if(!$key || !array_key_exists($key, $this->attrs))
            return null;
        $this->attrs[$key] = $val;
    }
}