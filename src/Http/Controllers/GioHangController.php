<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Cart;
use Luccui\Core\Request;
use Luccui\Core\Session;
use Luccui\Models\SanPham;

class GioHangController extends Controller
{
    public function cart()
    {
        $cart = app(Cart::class)->getItems();
        $sanphamIds = [];
        foreach ($cart as $items) {
            foreach ($items as $item) {
                $sanphamIds[] = $item['id'];
            }
        }
        $sanphams = SanPham::whereIn('id', array_values($sanphamIds))->get();

        return view('/client/sanpham/gio-hang.php', [
            'sanphams' => $sanphams
        ]);
    }
    public function add()
    {
        $sanpham_id = $this->request->sanpham_id;
        $so_luong = $this->request->so_luong ?? 1;
        $sanpham = SanPham::where('id', '=', $sanpham_id)->first();

        if($sanpham) {
            resolve(Cart::class)->add($sanpham_id, $so_luong, [
                'ten_san_pham' => $sanpham->ten_san_pham,
                'hinh_anh' => $sanpham->hinh_anh,
                'gia_cuoi_cung' => $sanpham->gia_cuoi_cung
            ]);
        }
        Session::back();
    }
    public function update()
    {
        var_dump(app(Request::class));
    }
}
