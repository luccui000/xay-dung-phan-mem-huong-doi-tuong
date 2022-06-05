<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Cart;
use Luccui\Core\Request;
use Luccui\Models\SanPham;

class GioHangController
{
    public function cart()
    {
        return view('/client/sanpham/gio-hang.php');
    }
    public function add()
    {
        $request = resolve(Request::class);
        $sanpham_id = $request->sanpham_id;
        $so_luong = $request->so_luong;
        $sanpham = SanPham::where('id', '=', $sanpham_id)->first();

        if($sanpham) {
            resolve(Cart::class)->add($sanpham_id, $so_luong, [
                'ten_san_pham' => $sanpham->ten_san_pham,
                'hinh_anh' => $sanpham->hinh_anh,
                'gia_cuoi_cung' => $sanpham->gia_cuoi_cung
            ]);
        }
    }
    public function update()
    {
        var_dump(app(Request::class));
    }
}
