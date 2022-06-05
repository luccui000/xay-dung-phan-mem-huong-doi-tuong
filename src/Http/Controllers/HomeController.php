<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Database;
use Luccui\Core\Request;
use Luccui\Models\BienThe;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\SanPham;

class HomeController
{
    public function index()
    {
        new Database(app('config')->db);
        $sanphams = SanPham::all();
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
