<?php

namespace Luccui\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Luccui\Classes\Model;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnh;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\NhaCungCap;
use Luccui\Models\SanPham;

class DanhSachSanPhamController extends Controller
{
    public function index()
    {
//        $danhmuc_id = $this->request->query['id'] ?? 3;
        $sanphams = SanPham::all()
                    ->map(function ($sanpham) {
                        $danhmucs = DanhMuc::withRelation($sanpham->id);
                        $nhacungcaps= NhaCungCap::withRelation($sanpham->id);

                        $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $sanpham->id)
                            ->leftJoin('hinhanh', 'hinhanh_sanpham.hinhanh_id', '=', 'hinhanh.id')
                            ->get()
                            ->toArray();
                        $hinhanhs = array_map(function ($item) {
                            return get_object_vars($item);
                        }, $hinhanhs);
                        return [
                            get_object_vars($sanpham),
                            'danhmucs' => $danhmucs,
                            'nhacungcaps' => $nhacungcaps,
                            'hinhanhs' => $hinhanhs
                        ];
                    });
        return view('client/sanpham/tat-ca.php', [
            'sanphams' => $sanphams
        ]);
    }
}
