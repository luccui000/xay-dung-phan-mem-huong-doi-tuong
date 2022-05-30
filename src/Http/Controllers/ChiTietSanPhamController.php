<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Request;
use Luccui\Models\BienThe;
use Luccui\Models\GiaTri;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\SanPham;
use Luccui\Models\TuyChon;

class ChiTietSanPhamController extends Controller
{
    public function detail()
    {
        $request = new Request();
        $id = $request->query['id'];
        $sanpham = SanPham::with(['nhacungcap', 'danhmuc'])
            ->where('sanpham.id', '=', $id)
            ->first();

        if($sanpham) {
            $bienthes = BienThe::where('sanpham_id', '=', $id)->get();
            $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $id)
                    ->join("hinhanh", "hinhanh_sanpham.id", '=', "hinhanh.id")
                    ->get();

            $tuychons = TuyChon::where('sanpham_id', '=', $id)
                ->get();

            $tuychons = $tuychons->map(function($item) {
                    return $item->ten_tuy_chon;
                });

            $giatris = GiaTri::where('sanpham_id', '=', $id)
                ->orderBy('ten_gia_tri')
                ->get();

            $giatris = $giatris->map(function($item) use ($tuychons) {
                $arr = explode('_', $item->ten_gia_tri);
                return match ($tuychons->count()) {
                    1 => [
                        $tuychons[0] => $arr[0]
                    ],
                    2 => [
                        $tuychons[0] => $arr[0],
                        $tuychons[1] => $arr[1]
                    ],
                    3 => [
                        $tuychons[0] => $arr[0],
                        $tuychons[1] => $arr[1],
                        $tuychons[2] => $arr[2]
                    ],
                    default => null,
                };
            });

            $hinhanhs = $hinhanhs->map(function ($item) {
                return $item->duong_dan;
            });

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
        } else {
            return view("errors/404.php");
        }
    }
}
