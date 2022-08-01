<?php

namespace Luccui\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Luccui\Core\View;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\NhaCungCap;
use Luccui\Models\SanPham;

class DanhSachSanPhamController extends Controller
{
    public function show() {
        return include(BASE_APP . "/resources/views/" . trim("client/sanpham/tat-ca-v2.php", "/"));
    }
    public function index()
    {
        $trang = $this->request->query['trang'] ?? 1;
        $danhmuc = $this->request->query['danhmuc'] ?? null;
        $nhacungcap = $this->request->query['nhacungcap'] ?? null;
        $q = $this->request->query['q'] ?? null;

        $sanphams = null;

        if(is_null($sanphams) && !is_null($q)) {
            $sanphams = SanPham::where('ten_san_pham', 'LIKE', "%$q%");
        }
        if(is_null($sanphams) && !is_null($danhmuc) && is_array($danhmuc)) {
            $sanphams = SanPham::whereIn('danhmuc_id', array_values($danhmuc));
        } else if (!is_null($sanphams) && !is_null($danhmuc) && is_array($danhmuc)) {
            $sanphams = $sanphams->whereIn('danhmuc_id', array_values($danhmuc));
        }
        if(is_null($sanphams) && !is_null($nhacungcap) && is_array($nhacungcap)) {
            $sanphams = SanPham::whereIn('nhacungcap_id', array_values($nhacungcap));
        } else if (!is_null($sanphams) && !is_null($nhacungcap) && is_array($nhacungcap)) {
            $sanphams = $sanphams->whereIn('nhacungcap_id', array_values($nhacungcap));
        }
        if(is_null($sanphams)) {
            $sanphams = SanPham::paginate(12, '*', 'trang', $trang);
        } else {
            $sanphams = $sanphams->paginate(12, '*', 'trang', $trang);
        }

        $sanphams = stdClassToArray($sanphams);
        $data = $sanphams['data'];

        $sanphams['data'] = Collection::make($data)
            ->map(function ($sanpham) {
                $danhmucs = DanhMuc::withRelation($sanpham['id']);
                $nhacungcaps= NhaCungCap::withRelation($sanpham['id']);

                $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $sanpham['id'])
                    ->leftJoin('hinhanh', 'hinhanh_sanpham.hinhanh_id', '=', 'hinhanh.id')
                    ->get()
                    ->toArray();
                $hinhanhs = array_map(function ($item) {
                    return get_object_vars($item);
                }, $hinhanhs);
                return [
                    $sanpham,
                    'danhmucs' => $danhmucs,
                    'nhacungcaps' => $nhacungcaps,
                    'hinhanhs' => $hinhanhs
                ];
            });
        $danhmucs = DanhMuc::selectRaw('danhmuc.id, danhmuc.ten_danh_muc, count(danhmuc.ten_danh_muc) as so_luong_san_pham')
            ->leftJoin('sanpham', 'danhmuc.id', '=', 'sanpham.danhmuc_id')
            ->groupBy(['danhmuc.id', 'danhmuc.ten_danh_muc'])
            ->orderBy('so_luong_san_pham', 'desc')
            ->get();
        $nhacungcaps = NhaCungCap::selectRaw('nhacungcap.id, nhacungcap.ten_nha_cung_cap, count(nhacungcap.id) as so_luong_san_pham')
            ->leftJoin('sanpham', 'nhacungcap.id', '=', 'sanpham.nhacungcap_id')
            ->groupBy(['nhacungcap.id', 'nhacungcap.ten_nha_cung_cap'])
            ->orderBy('so_luong_san_pham', 'desc')
            ->get();
        return view('client/sanpham/tat-ca.php', [
            'sanphams' => $sanphams,
            'danhmucs' => $danhmucs,
            'nhacungcaps' => $nhacungcaps,
        ]);
    }
}
