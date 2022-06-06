<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Core\Request;
use Luccui\Services\DiaChi\DiaChi;

class DiaChiController
{
    public function danhSachHuyen()
    {
        $maTinh = app(Request::class)->query['ma_tinh'];
        if(!$maTinh) {
            return json_encode([
                'status' => 200,
                'message' => "Mã tỉnh không hợp lệ",
                'data' => null
            ]);
        }
        $huyens = app(DiaChi::class)->danhSachHuyen($maTinh);
        return json_encode([
            'status' => 200,
            'message' => "Lấy dữ liệu thành công",
            'data' => $huyens
        ]);
    }
    public function danhSachXa()
    {
        $maHuyen = app(Request::class)->query['ma_huyen'];

        if(!$maHuyen) {
            return json_encode([
                'status' => 200,
                'message' => "Mã huyện không hợp lệ",
                'data' => null
            ]);
        }
        $xas = app(DiaChi::class)->danhSachXa($maHuyen);

        return json_encode([
            'status' => 200,
            'message' => "Lấy dữ liệu thành công",
            'data' => $xas
        ]);
    }
}
