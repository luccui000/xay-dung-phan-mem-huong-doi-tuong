<?php

namespace Luccui\Core;

use Closure;
use Luccui\Exceptions\RouteNotFoundException;

class Router
{
    private static array $routes = [];
    private static array $names = [];

    public function register($requestMethod, $route, Closure|array $closure, $name = '')
    {
        $route = DIRECTORY_SEPARATOR . ltrim($route, "/");
        static::$routes[$requestMethod][$route] = $closure;
        if(!empty($name))
            static::$names[$name] = [
                'route' => $route,
                'method' => $requestMethod
            ];
        return $this;
    }
    public static function get($route, Closure|array $action, $name = '')
    {
        return (new static())->register('get', $route, $action, $name);
    }
    public static function post($route, Closure|array $action, $name = '')
    {
        return (new static())->register('post', $route, $action, $name);
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getNames(): array
    {
        return static::$names;
    }

    /**
     * @throws RouteNotFoundException
     */
    public static function resolve($requestUrl, $requestMethod): mixed
    {
        $route = explode("?", $requestUrl)[0];
        $action = self::$routes[$requestMethod][$route] ?? null;
        if(!$action) {
            throw new RouteNotFoundException();
        }
        if(is_callable($action))
            return call_user_func($action);
        if(is_array($action)) {
            [$class, $method] = $action;
            if(class_exists($class)) {
                $class = new $class();
                if(method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
        throw new RouteNotFoundException();
    }
}
