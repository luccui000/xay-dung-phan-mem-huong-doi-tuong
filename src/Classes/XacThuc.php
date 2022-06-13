<?php

namespace Luccui\Classes;

use Luccui\Core\Session;
use Luccui\Models\TaiKhoan;

class XacThuc
{

    const SESSION_DA_DANG_NHAP = 'da_dang_nhap';
    const SESSION_ID_TAI_KHOAN = 'id_tai_khoan';
    const SESSION_TEN_TAI_KHOAN = 'ten_tai_khoan';
    const SESSION_ADMIN_DA_DANG_NHAP = 'admin_da_dang_nhap';
    const SESSION_ADMIN_ID_TAI_KHOAN = 'admin_id_tai_khoan';
    const SESSION_ADMIN_TEN_TAI_KHOAN = 'admin_ten_tai_khoan';

    public function dangnhap($tenDangNhap, $matKhau)
    {
        $matKhauMaHoa = $this->maHoaMatKhau($matKhau);
        $taikhoan = $this->timTaiKhoan($tenDangNhap, $matKhauMaHoa);
        if(is_null($taikhoan)) {
            return false;
        }
        if(!isset($taikhoan->id)) {
            return false;
        }
        $this->dangnhapThanhCong($taikhoan->id, $taikhoan->ten_dang_nhap);
        return true;
    }
    public static function dangNhapAdmin($tenDangNhap, $matKhau)
    {
        $static = new static();
        $matKhauMaHoa = $static->maHoaMatKhau($matKhau);
        $taikhoan = $static->timTaiKhoanAdmin($tenDangNhap, $matKhauMaHoa);

        if($taikhoan->id) {
            $static->dangNhapAdminThanhCong($taikhoan->id, $taikhoan->ten_dang_nhap);
            return true;
        }
        return false;
    }
    private function maHoaMatKhau($matKhau)
    {
        return Hash::generate($matKhau);
    }
    private function dangnhapThanhCong($idTaiKhoan, $tenDangNhap)
    {
        Session::set(self::SESSION_DA_DANG_NHAP, true);
        Session::set(self::SESSION_ID_TAI_KHOAN, $idTaiKhoan);
        Session::set(self::SESSION_TEN_TAI_KHOAN, $tenDangNhap);
    }
    public function timTaiKhoan($tenDangNhap, $matKhau)
    {
        $taikhoan = TaiKhoan::where('mat_khau', '=', $matKhau)
            ->where('ten_dang_nhap', '=', $tenDangNhap)
            ->orWhere('email', '=', $tenDangNhap)
            ->orWhere('so_dien_thoai', '=', $tenDangNhap)
            ->first();

        if(is_null($taikhoan))
            return false;
        return $taikhoan;
    }
    private function dangNhapAdminThanhCong($idTaiKhoan, $tenDangNhap)
    {
        Session::set(self::SESSION_ADMIN_DA_DANG_NHAP, true);
        Session::set(self::SESSION_ADMIN_ID_TAI_KHOAN, $idTaiKhoan);
        Session::set(self::SESSION_ADMIN_TEN_TAI_KHOAN, $tenDangNhap);
    }
    public function dangXuatAdmin()
    {
        Session::remove(self::SESSION_ADMIN_DA_DANG_NHAP);
        Session::remove(self::SESSION_ADMIN_ID_TAI_KHOAN);
        Session::remove(self::SESSION_ADMIN_TEN_TAI_KHOAN);
    }
    public function timTaiKhoanAdmin($tenDangNhap, $matKhau)
    {
        $taikhoan = TaiKhoan::where('mat_khau', '=', $matKhau)
            ->where('ten_dang_nhap', '=', $tenDangNhap)
            ->where('quyen', '=', 1)
            ->first();

        if(is_null($taikhoan))
            return false;
        return $taikhoan;
    }
}
