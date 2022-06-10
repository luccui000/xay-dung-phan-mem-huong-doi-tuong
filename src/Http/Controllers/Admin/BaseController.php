<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\XacThuc;
use Luccui\Core\Session;
use Luccui\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!Session::has(XacThuc::SESSION_ADMIN_DA_DANG_NHAP) ||
            !Session::has(XacThuc::SESSION_ADMIN_DA_DANG_NHAP)
        ) {
            redirect('/admin/dang-nhap');
        }
    }
}
