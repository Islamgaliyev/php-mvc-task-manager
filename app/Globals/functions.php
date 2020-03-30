<?php

function dd($dd)
{
    var_dump($dd);
    die();
}

function public_path()
{
    return $_SERVER['DOCUMENT_ROOT'].'/public/';
}

function config($key)
{
    $config = include $_SERVER['DOCUMENT_ROOT'].'/config/app.php';
    return $config[$key] ?? null;
}

function route($uri)
{
    return config('app_url')."/$uri";
}

function redirect($url)
{
    header("Location: $url");
}