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
        $sanphams = SanPham::with(['nhacungcap', 'danhmuc'])
            ->leftJoin("bienthe as b", function ($join) {
                return $join->on('sanpham.id', '=', 'b.sanpham_id');
            })
            ->join("hinhanh_sanpham", "sanpham.id", "=", "hinhanh_sanpham.sanpham_id")
            ->join("hinhanh", "hinhanh_sanpham.hinhanh_id", "=", "hinhanh.id")
            ->selectRaw("sanpham.id, hinhanh.duong_dan, sanpham.ten_san_pham, sanpham.la_san_pham_noi_bat, sanpham.la_san_pham_giam_gia, sanpham.la_san_pham_moi, min(b.gia_von) as gia_von")
            ->groupBy(["id", "hinhanh.duong_dan"])
            ->get();

//        var_dump($sanphams);
        $danhmucs = DanhMuc::take(6)->get();

        return view("client/index.php", [
            'danhmucs' => $danhmucs,
            'sanphams' => $sanphams
        ]);
    }
    public function detail()
    {
        $request = new Request();
        $id = $request->query['id'];
        $sanpham = SanPham::with(['nhacungcap', 'danhmuc'])
            ->where('sanpham.id', '=', $id)
            ->first();

        $bienthes = BienThe::where('sanpham_id', '=', $id)->get();
        $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $id)
            ->join("hinhanh", "hinhanh_sanpham.id", '=', "hinhanh.id")
            ->get();
        $hinhanhs = $hinhanhs->map(function ($item) {
           return $item->duong_dan;
        });
        if($sanpham) {
            $sanphamLienQuan = SanPham::where('danhmuc_id', '=', $sanpham->danhmuc_id)
                ->leftJoin("bienthe as b", function ($join) {
                    return $join->on('sanpham.id', '=', 'b.sanpham_id');
                })
                ->join("hinhanh_sanpham", "sanpham.id", "=", "hinhanh_sanpham.sanpham_id")
                ->join("hinhanh", "hinhanh_sanpham.hinhanh_id", "=", "hinhanh.id")
                ->selectRaw('sanpham.*, min(hinhanh.duong_dan) as duong_dan, min(b.gia_von) as gia_von')
                ->groupBy(['sanpham.id', 'hinhanh.duong_dan'])
                ->get();
            return view("client/sanpham/chi-tiet.php", [
                'sanpham' => $sanpham,
                'sanphamlienquans' => $sanphamLienQuan,
                'bienthes' => $bienthes,
                'hinhanhs' => $hinhanhs
            ]);
        }
    }
    public function checkout()
    {
        return view("client/giohang/checkout.php", [

        ]);
    }
}
