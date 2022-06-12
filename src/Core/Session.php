<?php

namespace Luccui\Core;

use Luccui\Exceptions\MethodNotFoundException;
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
    public static function set($key, $value)
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
    public static function back()
    {
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
        return static::class;
    }
    public static function with($data = [])
    {
        foreach ($data as $key => $value) {
            static::set($key, $value);
        }
        return self::class;
    }

    /**
     * @throws MethodNotFoundException
     */
    public static function __callStatic(string $method, array $arguments)
    {
        $model = static::class;
        if(!method_exists($model, $method)) {
            $className = get_class($model);
            throw new MethodNotFoundException("Class ${$className} has not method ${method}");
        }
        call_user_func_array([$model, $method], $arguments);
        return $model;
    }
}
