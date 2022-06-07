<?php

namespace Luccui\Core;

use Luccui\Exceptions\SessionNotFoundException;

class Session
{
    /**
     * @throws SessionNotFoundException
     */
    public static function get($key)
    {
        if(!static::has($key))
            throw new SessionNotFoundException("Session {$key} not found");
        return unserialize($_SESSION[$key]);
    }
    public static function set($key, $value)
    {
        if(empty($key) || empty($value))
            return null;
        return $_SESSION[$key] = serialize($value);
    }
    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @throws SessionNotFoundException
     */
    public static function remove($key): void
    {
        if(!static::has($key))
            throw new SessionNotFoundException("Session {$key} not found");
        unset($_SESSION[$key]);
    }
    public static function back()
    {
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
    }
}
