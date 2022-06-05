<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Request;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\SanPham;

class ChiTietSanPhamController extends Controller
{
    public function detail()
    {
        $id = app(Request::class)->query['id'];

        $sanpham = SanPham::where('sanpham.id', '=', $id)
            ->leftJoin('danhmuc', 'danhmuc.id', '=', 'sanpham.danhmuc_id')
            ->selectRaw("sanpham.*, danhmuc.ten_danh_muc")
            ->first();
        if($sanpham) {
            $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $id)
                ->join('hinhanh', 'hinhanh_sanpham.id', '=', 'hinhanh.id')
                ->get();
            $sanphamLienQuan = SanPham::where('danhmuc_id', '=', $sanpham->danhmuc_id)
                ->get();
            return view("client/sanpham/chi-tiet.php", [
                'sanpham' => $sanpham,
                'hinhanhs' => $hinhanhs,
                'sanphamlienquans' => $sanphamLienQuan
            ]);
        } else {
            return view("errors/404.php");
        }
    }
}
