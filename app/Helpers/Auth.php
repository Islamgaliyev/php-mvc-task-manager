<?php

namespace App\Helpers;

class Auth
{
    public static function attempt($user)
    {
        $_SESSION['AUTH_USER']['userId'] = $user->id;
        $_SESSION['AUTH_USER']['username'] = $user->login;
        $_SESSION['AUTH_USER']['isAdmin'] = $user->isAdmin;
    }

    public static function user()
    {
        return isset($_SESSION['AUTH_USER']) ? (Object)$_SESSION['AUTH_USER'] : null;
    }

    public static function logout()
    {
        unset($_SESSION['AUTH_USER']);
    }

    public static function id()
    {
        return $_SESSION['AUTH_USER']['userId'] ?? null;
    }
}