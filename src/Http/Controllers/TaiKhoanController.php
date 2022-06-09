<?php

namespace Luccui\Http\Controllers;

use Illuminate\Database\QueryException;
use Luccui\Classes\XacThuc;
use Luccui\Core\Session;
use Luccui\Factories\TaiKhoanFactory;
use Luccui\Models\TaiKhoan;

class TaiKhoanController extends Controller
{
    public function formDangKy()
    {
        return view('/client/taikhoan/dang-ky.php');
    }
    public function DangKy()
    {
        $formData = $this->request->all();
        $hoTen = explode(' ', $formData['ho_ten']);
        $formData['ho_khach_hang'] = array_shift($hoTen);
        $formData['ten_khach_hang'] = array_pop($hoTen);
        $insertData = TaiKhoanFactory::make($formData)->toArray();

        unset($insertData['id']);
        unset($insertData['quyen']);

        try {
            TaiKhoan::insert($insertData);
            redirect('/dang-nhap');
        } catch (QueryException $exception) {
            var_dump($exception->getMessage());
        }
    }

    public function DangNhap()
    {
        $formData = $this->request->all();
        $xacthuc = new XacThuc();
        $isOk = $xacthuc->dangnhap($formData['ten_dang_nhap'], $formData['mat_khau']);

        if($isOk) {
            if(Session::has('thatbai')) {
                Session::remove('thatbai');
            }
            redirect('/');
        } else {
            Session::set('thatbai', 'Tài khoản hoặc mật khẩu không đúng');
            Session::back();
        }
    }
}
