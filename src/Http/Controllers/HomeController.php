<?php

namespace Luccui\Http\Controllers;


use Illuminate\Database\Capsule\Manager as Capsule;
use Luccui\Core\Request;
use Luccui\Models\DanhMuc;
use Luccui\Models\SanPham;

class HomeController
{
    public function index()
    {
        $danhmucs = Capsule::table('danhmuc')
                        ->take(6)
                        ->get();
        $sanphams = SanPham::all();

        return view("client/index.php", [
            'danhmucs' => $danhmucs,
            'sanphams' => $sanphams
        ]);
    }
    public function detail()
    {
        $request = new Request();
        return view("client/sanpham/detail.php", [

        ]);
    }
    public function checkout()
    {
        return view("client/giohang/checkout.php", [

        ]);
    }
}
