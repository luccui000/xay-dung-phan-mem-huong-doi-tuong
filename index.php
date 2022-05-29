<?php

header("Content-type: text/html; charset=utf-8");

use Luccui\Core\Application;

require_once "./vendor/autoload.php";
require_once "./src/helpers.php";
require_once "define.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once "./routes/web.php";
require_once "./routes/api.php";

(new Application(
    $_SERVER['REQUEST_URI'] != "/" ?
        rtrim($_SERVER['REQUEST_URI'], '/') :
        $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
))->run();
