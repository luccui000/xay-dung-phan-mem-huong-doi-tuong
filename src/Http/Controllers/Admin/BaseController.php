<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\XacThuc;
use Luccui\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!has_session(XacThuc::SESSION_ADMIN_DA_DANG_NHAP)) {
            set_session('previous_url', $_SERVER['REQUEST_URI']);
            redirect('/admin/dang-nhap');
        }
    }
}
