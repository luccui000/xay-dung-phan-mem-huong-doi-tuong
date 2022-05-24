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
        return $_SESSION[$key];
    }
    public static function set($key, $value): array|null
    {
        if(empty($key) || empty($value))
            return null;
        return $_SESSION[$key] = $value;
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
}
