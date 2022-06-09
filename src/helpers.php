<?php


use Luccui\Core\Application;
use Luccui\Core\Router;
use Luccui\Core\View;
use Luccui\Exceptions\RouteNotFoundException;

if(!function_exists('assets')) {
    function assets($resource): string {
        return BASE_URL . ltrim($resource, "/");
    }
}
if(!function_exists('partial')) {
    function partial($path, $layout = 'admin') : void {
        $fullPath = RESOURCE_PATH . $layout . DIRECTORY_SEPARATOR . $path;
        include $fullPath;
    }
}
if(!function_exists('view')) {
    function view($path, $data = []) {
        return View::make($path, $data)->render();
    }
}
if(!function_exists('app')) {
    function app($container) {
        return Application::$container->get($container);
    }
}
if(!function_exists('resolve')) {
    function resolve($container) {
        return Application::$container->get($container);
    }
}
if(!function_exists('route')) {
    function route($name, $params = []) {
        if(!isset(Router::getNames()[$name]))
            throw new RouteNotFoundException("Route not found");
        if(is_array($params) && count($params) > 0) {
            $query = http_build_query($params);
            return Router::getNames()[$name]['route'] . '?' . $query;
        }
        return Router::getNames()[$name]['route'] ;
    }
}
if(!function_exists('vnmoney')) {
    function vnmoney($priceFloat, $decimals = 0, $thousands_separator = ',') {
        $price = number_format($priceFloat, 0, $decimals, $thousands_separator);
        return $price .'đ';
    }
}
if(!function_exists('dd')) {
    function dd() {
        array_map(static function($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }
}
if(!function_exists('stdClassToArray')) {
    function stdClassToArray($inputs): array {
        return json_decode(json_encode($inputs), true);
    }
}
if(!function_exists('objectToArray')) {
    function objectToArray(ArrayObject $inputs): array {
        $array = [];
        foreach ($inputs as $input) {
            $array[] = get_object_vars($input);
        }
        return $array;
    }
}
if(!function_exists('stdClassToArray')) {
    function stdClassToArray($input): array {
        return get_object_vars($input);
    }
}
if(!function_exists('clientBasePath')) {
    function clientBasePath(): string {
        return RESOURCE_PATH . 'client' . DIRECTORY_SEPARATOR;
    }
}
if (!function_exists('redirect')) {
    function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}
