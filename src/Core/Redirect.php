<?php

namespace Luccui\Core;

class Redirect
{
    public static function redirect($to)
    {
        ob_start();
        header("Location: {$to}");
    }
    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("Location: {$uri}");
    }
}
