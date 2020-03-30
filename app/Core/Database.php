<?php

namespace App\Core;

class Database
{
    public function __construct()
    {
        $config = config('database');
        new \Pixie\Connection('mysql', $config, 'QB');
    }
}