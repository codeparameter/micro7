<?php

namespace App\Models;
use App\Models\Contracts\MysqlBaseModel;

class User extends MysqlBaseModel{
    public function __construct($id = null)
    {
        $this->table = "UsersTABLE";
        $this->primaryKey = "UserID";
        parent::__construct($id);
    }
}