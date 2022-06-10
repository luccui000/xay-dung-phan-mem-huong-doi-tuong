<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\XacThuc;

class TrangChuController extends BaseController
{
    public function index()
    {
        return view('admin/trangchu/index.php');
    }
    public function dangnhap()
    {
        $isOk = XacThuc::dangNhapAdmin(
            $this->request->ten_dang_nhap,
            $this->request->mat_khau
        );
        var_dump($isOk);
    }
}
