<?php

if(!defined('BASE_APP')) {
    define('BASE_APP', str_replace("\\", "/", __DIR__) . DIRECTORY_SEPARATOR);
}

if(!defined('BASE_URL')) {
    define('BASE_URL', 'http://lara-ecommerce.local/');
}
if(!defined('RESOURCE_PATH')) {
    define('RESOURCE_PATH', BASE_APP . 'resources/views/');
}
if(!defined('CLIENT_BASE_PATH')) {
    define('CLIENT_BASE_PATH', RESOURCE_PATH . 'client' . DIRECTORY_SEPARATOR);
}
