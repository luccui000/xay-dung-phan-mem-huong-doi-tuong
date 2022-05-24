<?php

declare(strict_types=1);
namespace Luccui\Exceptions;

class RouteNotFoundException extends  \Exception
{
    public $message = "404 Page Not Found";
}
