<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\XacThuc;
use Luccui\Core\Request;
use Luccui\Core\Session;

class DangNhapController
{
    public function dangnhap()
    {
        $request = app(Request::class);
        $isOk = XacThuc::dangNhapAdmin(
            $request->ten_dang_nhap,
            $request->mat_khau
        );
        if($isOk) {
            if(has_session('previous_url')) {
               $previousUrl = get_session('previous_url');
               remove_session('previous_url');
               header("Location: $previousUrl");
            } else {
                redirect('/admin/trang-chu');
            }
        } else {
            set_session('error', 'Tên đăng nhập hoặc mật  khoong ddung');
            Session::back();
        }
    }
}
