<?php

namespace App\Factory;

use App\Contracts\Factory\BaseFactory;
use Jenssegers\Blade\Blade;

class ViewFactory extends BaseFactory
{
    public static function make($type = 'Blade', $params = array())
    {
        if ($type == 'Blade') {
            $viewPath = static::getViewsPath();
            $cachePath = static::getCachePath();
            return new Blade($viewPath, $cachePath);
        }
    }

    private static function getViewsPath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/resources/views/';
    }

    private static function getCachePath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/resources/cache/';
    }

}
