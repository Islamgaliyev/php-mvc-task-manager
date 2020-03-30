<?php

namespace App\Core;

class Request
{
    public $get = array();
    public $post = array();
    public $cookie = array();
    public $files = array();
    public $request = array();
    public $server = array();
    public $route;

    public function __construct()
    {
        $this->route = $this->clean($_SERVER['REQUEST_URI']);
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        $this->request = $this->clean($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
        $this->server = $this->clean($_SERVER);
    }

    public function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);
                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }
        return $data;
    }

    public function all()
    {
        return (Object)$this->request;
    }

}