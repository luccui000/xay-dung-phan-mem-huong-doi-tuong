<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Database;
use Luccui\Core\Request;
use Luccui\Helpers\Config;
use Luccui\Models\BienThe;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\SanPham;

class HomeController
{
    public function index()
    {
        new Database(app(Config::class)->db);
        $sanphams = SanPham::join('danhmuc', 'danhmuc.id', '=', 'sanpham.danhmuc_id')
            ->select([
                'sanpham.*',
                'danhmuc.ten_danh_muc'
            ])
            ->get();
//        var_dump($sanphams);
        $danhmucs = DanhMuc::take(6)->get();

        return view("client/index.php", [
            'danhmucs' => $danhmucs,
            'sanphams' => $sanphams
        ]);
    }

    public function checkout()
    {
        return view("client/giohang/checkout.php", [

        ]);
    }
}
