<?php

header("Content-type: text/html; charset=utf-8");

use Luccui\Core\Application;
use Luccui\Core\Database;
use Luccui\Core\Router;

require_once "./vendor/autoload.php";
require_once "./src/helpers.php";
require_once "define.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = require_once "./routes/web.php";

(new Application(
    $router,
    $_SERVER['REQUEST_URI'] != "/" ?
        rtrim($_SERVER['REQUEST_URI'], '/') :
        $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
))->run();
