<?php

namespace App\Factory;

use App\Contracts\Factory\BaseFactory;
use App\Services\AuthService;
use App\Services\TaskService;

class ServiceFactory extends BaseFactory
{
    public static function make($serviceName, $params = array())
    {
        if (!$serviceName) {
            throw new \Exception("Service not found");
        }
        if ($serviceName == 'AuthService') {
            return new AuthService();
        }
        if ($serviceName == 'TaskService') {
            return new TaskService();
        }
    }
}