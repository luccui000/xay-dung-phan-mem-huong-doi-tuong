<?php

namespace Luccui\Http\Controllers;

use Luccui\Models\SanPham;

class DanhMucSanPhamController extends Controller
{
    public function show()
    {
        $danhmuc_id = $this->request->query['id'];
        $sanphams = SanPham::where('danhmuc_id', '=', $danhmuc_id)
            ->join('danhmuc', 'danhmuc.id', '=', 'sanpham.danhmuc_id')
            ->select([
                'sanpham.*',
                'danhmuc.ten_danh_muc'
            ])
            ->get();
        var_dump($sanphams);
    }
}
