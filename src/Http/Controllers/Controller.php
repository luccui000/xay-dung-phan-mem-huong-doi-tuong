<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Request;

class Controller
{
    protected Request $request;

    public function __construct()
    {
        $this->request = app(Request::class);
    }
}
