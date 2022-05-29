<?php

namespace Luccui\Http\Controllers;


use Illuminate\Database\Capsule\Manager;
use Luccui\Core\Request;
use Luccui\Helpers\FileUpload;
use Luccui\Models\BienThe;
use Luccui\Models\DanhMuc;
use Luccui\Models\GiaTri;
use Luccui\Models\GiaTriTuyChon;
use Luccui\Models\NhaCungCap;
use Luccui\Models\SanPham;
use Luccui\Models\TuyChon;

class SanphamController extends Controller
{

    public function index()
    {
        $sanphams = SanPham::with(['nhacungcap', 'danhmuc'])
            ->leftJoin("bienthe as b", function ($join) {
                return $join->on('sanpham.id', '=', 'b.sanpham_id');
            })
            ->groupBy("id")
            ->selectRaw("sanpham.id, sanpham.ma_san_pham, sanpham.ten_san_pham, sanpham.mo_ta_ngan, sanpham.la_san_pham_noi_bat, sanpham.la_san_pham_giam_gia, sanpham.la_san_pham_moi, sanpham.trang_thai, min(b.gia_von) as gia_von")
            ->get();

        return view('admin/sanpham/index.php', [
            'sanphams' => $sanphams
        ]);
    }
    public function create()
    {
        $danhmucs = DanhMuc::all();
        $nhacungcaps = NhaCungCap::all();
        $tuychons = TuyChon::selectRaw("distinct(ten_tuy_chon)")->get();
//        var_dump($tuychons);
        return view('admin/sanpham/create.php', [
            'danhmucs' => $danhmucs,
            'nhacungcaps' => $nhacungcaps,
            'tuychons' => $tuychons
        ]);
    }
    public function store()
    {

         $request = new Request();
         var_dump($request);
//         var_dump($request->file['hinhanhs_1']);
         for($i = 0; $i < SanPham::TOTAL_IMAGE_UPLOAD; $i++) {
            if(FileUpload::isImage($request->file['hinhanhs_' . $i + 1])) {
                FileUpload::save($request->file['hinhanhs_' . $i + 1], "uploads/sanpham");
            }
         }
         $sanphamgiamgia = $request->gia_ban < $request->gia_von;
         $sanpham_id = SanPham::insertGetId([
             'ma_san_pham' => $request->ma_san_pham,
             'ten_san_pham' => $request->ten_san_pham,
             'nhacungcap_id' => $request->nhacungcap_id,
             'danhmuc_id' => $request->danhmuc_id,
             'mo_ta_ngan' => $request->mo_ta_ngan,
             'mo_ta_chi_tiet' => $request->mo_ta,
             'la_san_pham_giam_gia' => $sanphamgiamgia,
             'la_san_pham_noi_bat' => $request->la_san_pham_noi_bat == "on" ? 1 : 0,
             'la_san_pham_moi' => 1,
             'nguoi_tao' => 1,
             'trang_thai' => $request->trang_thai == "on" ? 1 : 0,
             'ngay_tao' => date('Y/m/d')
         ]);
        if($request->co_bien_the == "on") {
            $totalKey = count($request->thuoctinh_key);
            for($i = 0; $i < $totalKey; $i++) {
                TuyChon::insert([
                    'id' => $i + 1,
                    'sanpham_id' => $sanpham_id,
                    'ten_tuy_chon' => $request->thuoctinh_key[$i]
                ]);
            }
            for ($i = 0; $i < count($request->gia_tri); $i++) {
                $giatri_id = GiaTri::insertGetId([
                    'sanpham_id' => $sanpham_id,
                    'ten_gia_tri' => $request->gia_tri[$i]
                ]);
                $giatri_tuychon_id = GiaTriTuyChon::insertGetId([
                    'sanpham_id' => $sanpham_id,
                    'giatri_id' => $giatri_id,
                ]);
                [$giaVon, $giaKhuyenMai, $soLuongNhap] = $request->bien_the[$request->gia_tri[$i]];
                BienThe::insert([
                    'id' => $i + 1,
                    'sanpham_id' => $sanpham_id,
                    'giatri_tuychon_id' => $giatri_tuychon_id,
                    'gia_von' => $giaVon,
                    'gia_khuyen_mai' => $giaKhuyenMai,
                    'so_luong_nhap' => $soLuongNhap,
                    'khoi_luong' => floatval($request->khoi_luong)
                ]);
            }
        }
    }
}
