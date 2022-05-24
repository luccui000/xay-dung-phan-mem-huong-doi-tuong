<?php

namespace Luccui\Http\Controllers;

use Luccui\Models\DanhMuc;

class DanhMucController extends Controller
{
    public function index()
    {
        DanhMuc::cayDanhMuc();
    }
}
