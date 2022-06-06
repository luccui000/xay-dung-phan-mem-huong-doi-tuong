<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Core\Request;
use Luccui\Services\GiaoHang\GiaoHang;
use Luccui\Services\GiaoHang\GiaoHangInterface;

class GiaoHangController
{

    public function phiGiaoHang()
    {
        $request = app(Request::class);
        $response = app(GiaoHang::class)
            ->phiGiaoHang($request->ma_xa, $request->ma_huyen, 50, 20, 200, 20);

        return json_encode($response);
    }
}
