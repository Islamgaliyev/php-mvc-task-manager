<?php

namespace App\Core;

class Route
{
    private $controller = null;
    private $action = null;
    private $ctrlWithAction = null;
    private $request = null;

    public function __construct(Request $r)
    {
        $this->request = $r;
        $this->ctrlWithAction = explode('/', strtok($r->route, '?'));

        if (!empty($this->ctrlWithAction[2])) {
            $this->controller = $this->getController($this->ctrlWithAction[1]);
            $this->action = $this->getAction($this->ctrlWithAction[2]);
            $this->start();
        }
    }

    private function start()
    {
        $controllerNamespace = "App\\Controllers\\".$this->controller;
        $controller = new $controllerNamespace;
        if (method_exists($controller, $this->action)) {
            call_user_func_array(array($controller, $this->action), array($this->request));
        }
    }

    private function getController($prefix)
    {
        return ucfirst($prefix) . 'Controller';
    }

    private function getAction($prefix)
    {
        return strtolower($prefix);
    }

}