<?php

namespace Luccui\Http\Controllers\Admin;


use Luccui\Core\Request;
use Luccui\Helpers\FileUpload;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnh;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\NhaCungCap;
use Luccui\Models\SanPham;
use Luccui\Models\TuyChon;

class SanphamController extends BaseController
{
    public function index()
    {
        $sanphams = SanPham::orderBy('ngay_tao')
            ->get();

        return view('admin/sanpham/index.php', [
            'sanphams' => $sanphams
        ]);
    }
    public function create()
    {
        $danhmucs = DanhMuc::all();
        $nhacungcaps = NhaCungCap::all();
//        $tuychons = TuyChon::selectRaw("distinct(ten_tuy_chon)")->get();

        return view('admin/sanpham/create.php', [
            'danhmucs' => $danhmucs,
            'nhacungcaps' => $nhacungcaps,
//            'tuychons' => $tuychons
        ]);
    }
    public function store()
    {
        $request = new Request();
        $sanpham_id = SanPham::insertGetId([
            'ma_san_pham' => $request->ma_san_pham,
            'ten_san_pham' => $request->ten_san_pham,
            'nhacungcap_id' => $request->nhacungcap_id,
            'danhmuc_id' => $request->danhmuc_id,
            'mo_ta_ngan' => $request->mo_ta_ngan,
            'mo_ta_chi_tiet' => $request->mo_ta_chi_tiet,
            'gia_san_pham' => floatval($request->gia_san_pham),
            'gia_cuoi_cung' => empty($request->gia_cuoi_cung) ?
                floatval($request->gia_san_pham) :
                floatval($request->gia_cuoi_cung),
            'la_san_pham_giam_gia' => $request->gia_san_pham > $request->gia_cuoi_cung,
            'la_san_pham_noi_bat' => $request->la_san_pham_noi_bat == "on" ? 1 : 0,
            'la_san_pham_moi' => 1,
            'nguoi_tao' => 1,
            'trang_thai' => $request->trang_thai == "on" ? 1 : 0,
            'ngay_tao' => date('Y/m/d')
        ]);
        $firstImage = null;
         for($i = 0; $i < SanPham::TOTAL_IMAGE_UPLOAD; $i++) {
             $imagePath = $this->saveImage($request->file['hinhanhs_1']);

             if($imagePath != null) {
                 if(is_null($firstImage))
                     $firstImage = $imagePath;

                 $hinhanh_id = HinhAnh::insertGetId([
                     'duong_dan' => $imagePath,
                     'ngay_tao' => date('Y/m/d')
                 ]);
                 HinhAnhSanPham::insertGetId([
                     'sanpham_id' => $sanpham_id,
                     'hinhanh_id' => $hinhanh_id
                 ]);
             }
         }
         if(!is_null($firstImage)) {
             SanPham::where('id', '=', $sanpham_id)
                 ->update([
                     'hinh_anh' => $firstImage,
                 ]);
         }
         redirect('/admin/san-pham');
    }
    public function edit()
    {
        $id = $this->request->query['id'] ?? null;
        $danhmucs = DanhMuc::all();
        $nhacungcaps = NhaCungCap::all();
        if(!is_null($id)) {
            $sanpham = SanPham::findFirst($id);
            $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $id)
                ->get();
            $hinhanhs = $hinhanhs->map(function ($item) use ($hinhanhs) {
                $hinhanh = HinhAnh::findFirst($item->hinhanh_id);
                return [
                    'id' => $item->id,
                    'duong_dan' => $hinhanh->duong_dan,
                    'ngay_tao' => $hinhanh->ngay_tao
                ];
            });
            return view('admin/sanpham/edit.php', [
                'sanpham' => $sanpham,
                'danhmucs' => $danhmucs,
                'nhacungcaps' => $nhacungcaps,
                'hinhanhs' => $hinhanhs->toArray()
            ]);
        } else {
            return "Khong tim thay";
        }
    }
    public function update()
    {
        var_dump($this->request->all());
    }
    public function saveImage($image)
    {
        if(!FileUpload::isImage($image))
            return null;
        return FileUpload::save($image);
    }
}
