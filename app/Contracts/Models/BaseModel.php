<?php

namespace App\Contracts\Models;

abstract class BaseModel
{
    public $db;
    public $table;

    public function __construct()
    {
        $this->db = \QB::table($this->table);
    }
}