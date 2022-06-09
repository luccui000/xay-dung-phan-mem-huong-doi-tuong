<?php

namespace Luccui\Classes;

use Luccui\Core\Session;
use Luccui\Models\TaiKhoan;

class XacThuc
{
    const SESSION_DA_DANG_NHAP = 'da_dang_nhap';
    const SESSION_ID_TAI_KHOAN = 'id_tai_khoan';
    const SESSION_TEN_TAI_KHOAN = 'ten_tai_khoan';

    public function dangnhap($tenDangNhap, $matKhau)
    {
        $hasher = new Hash();
        $matKhauMaHoa = $hasher->make($matKhau);
        $taikhoan = TaiKhoan::where('mat_khau', '=', $matKhauMaHoa)
            ->where('ten_dang_nhap', '=', $tenDangNhap)
            ->orWhere('email', '=', $tenDangNhap)
            ->orWhere('so_dien_thoai', '=', $tenDangNhap)
            ->first();
        if(is_null($taikhoan)) {
            return false;
        }
        if(!isset($taikhoan->id)) {
            return false;
        }
        $this->dangnhapThanhCong($taikhoan->id, $taikhoan->ten_dang_nhap);
        return true;
    }
    private function dangnhapThanhCong($idTaiKhoan, $tenDangNhap)
    {
        Session::set(self::SESSION_DA_DANG_NHAP, true);
        Session::set(self::SESSION_ID_TAI_KHOAN, $idTaiKhoan);
        Session::set(self::SESSION_TEN_TAI_KHOAN, $tenDangNhap);
    }
}
