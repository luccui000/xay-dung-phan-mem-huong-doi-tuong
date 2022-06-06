<?php

namespace Luccui\Http\Controllers;

use Luccui\Services\DiaChi\DiaChi;

class ThanhToanController
{

    public function checkout()
    {
        $tinhs = app(DiaChi::class)->danhSachTinh();

        return view('client/sanpham/thanh-toan.php', [
            'tinhs' => $tinhs
        ]);
    }
}
