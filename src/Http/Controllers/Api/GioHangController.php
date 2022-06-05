<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Classes\Cart;
use Luccui\Core\Request;
use Luccui\Models\SanPham;

class GioHangController
{
    public function update()
    {
        $sanpham_id = app(Request::class)->sanpham_id;
        $so_luong = app(Request::class)->so_luong;

        $sanpham = SanPham::where('id', '=', $sanpham_id)->first();
        if(!$sanpham) {
            return json_encode([
                'code' => 200,
                'message' => 'Mã sản phẩm không hợp lệ',
                'data' => null
            ]);
        }

        $soLuongTon = $sanpham->so_luong;

        if($so_luong > $soLuongTon) {
            return json_encode([
                'code' => 200,
                'message' => 'Vượt quá số lượng tồn',
                'data' => null
            ]);
        } else {
            $attributes = app(Cart::class)->getItem($sanpham_id)['attributes'];
            app(Cart::class)->update($sanpham_id, +$so_luong, $attributes);

            return json_encode([
                'code' => 200,
                'message' => 'Update success fully',
                'data' => [
                    'sanpham_id' => $so_luong,
                    'so_luong' => app(Cart::class)->getItem($sanpham_id)
                ]
            ]);
        }
    }
}
