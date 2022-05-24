<?php

namespace Luccui\Core;

use Closure;
use Luccui\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];
    private static array $names = [];

    public function register($requestMethod, $route, Closure|array $closure, $name = '')
    {
        $this->routes[$requestMethod][$route] = $closure;
        if(!empty($name))
            static::$names[$name] = [
                'route' => $route,
                'method' => $requestMethod
            ];
        return $this;
    }
    public function get($route, Closure|array $action, $name = '')
    {
        return $this->register('get', $route, $action, $name);
    }
    public function post($route, Closure|array $action, $name = '')
    {
        return $this->register('post', $route, $action, $name);
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public static function getNames(): array
    {
        return static::$names;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve($requestUrl, $requestMethod): mixed
    {
        $route = explode("?", $requestUrl)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;
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
