<?php


use Luccui\Classes\VietNamCharsetConversion;
use Luccui\Core\Application;
use Luccui\Core\Router;
use Luccui\Core\Session;
use Luccui\Core\View;
use Luccui\Exceptions\RouteNotFoundException;

if(!function_exists('assets')) {
    function assets($resource): string {
        return BASE_URL . ltrim($resource, "/");
    }
}
if(!function_exists('base_app')) {
    function base_app($path) {
        return BASE_APP . ltrim($path, "/");
    }
}
if(!function_exists('partial')) {
    function partial($path, $layout = 'admin') : void {
        $fullPath = RESOURCE_PATH . $layout . DIRECTORY_SEPARATOR . $path;
        include $fullPath;
    }
}
if(!function_exists('includes')) {
    function includes($viewPath, $layout = 'admin') {
        include RESOURCE_PATH . $layout . DIRECTORY_SEPARATOR . $viewPath;
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
    function vnmoney($priceFloat, $d = true, $decimals = 0, $thousands_separator = ',') {
        $price = number_format($priceFloat, 0, $decimals, $thousands_separator);
        return $d ?  $price . 'đ' : $price;
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
if(!function_exists('vietnamConversasion')) {
    function vietnam($text) {
        return new VietNamCharsetConversion($text);
    }
}
if(!function_exists('get_session')) {
    function get_session($key) {
        return Session::get($key);
    }
}
if(!function_exists('has_session')) {
    function has_session($key) {
        return Session::has($key);
    }
}
if(!function_exists('set_session')) {
    function set_session($key, $value) {
        return Session::set($key, $value);
    }
}
if(!function_exists('remove_session')) {
    function remove_session($key) {
        Session::remove($key);
    }
}
if(!function_exists('convertToObject')) {
    function convertToObject(array $input): object {
        $object = new stdClass();
        foreach ($input as $key => $value) {
            if(is_array($value)) {
                $value = convertToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
}
