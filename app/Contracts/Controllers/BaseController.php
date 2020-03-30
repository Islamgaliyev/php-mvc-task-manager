<?php

namespace App\Contracts\Controllers;



use App\Factory\ViewFactory;

abstract class BaseController
{
    protected $view;
    public function __construct()
    {
        $this->view = ViewFactory::make('Blade');
    }
}