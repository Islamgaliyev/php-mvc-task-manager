<?php

namespace App\Core;


class Bootstrap
{
    public function __construct()
    {
    }

    public function run()
    {
        session_start();
        $database = new Database();
        $request = new Request();
        $route = new Route($request);
    }
}