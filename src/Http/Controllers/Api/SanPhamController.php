<?php

namespace Luccui\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Collection;
use Luccui\Http\Controllers\Controller;
use Luccui\Models\DanhMuc;
use Luccui\Models\HinhAnhSanPham;
use Luccui\Models\NhaCungCap;
use Luccui\Models\SanPham;

class SanPhamController extends Controller
{
    public function nhacungcap()
    {
        $nhacungcaps = NhaCungCap::select(['id', 'ten_nha_cung_cap'])->get();
        return json_encode($nhacungcaps);
    }
    public function danhmuc()
    {
        $danhmucs = DanhMuc::select([
            'id',
            'ten_danh_muc'
        ])->get()->map(function($dm) {
            return array_merge(stdClassToArray($dm), [
                'so_luong' => SanPham::where('danhmuc_id', '=', $dm->id)->count()
            ]);
        })->sortBy([
            fn($a, $b) => $a['so_luong'] < $b['so_luong']
        ]);

        return json_encode($danhmucs);
    }
    public function sanpham() {
        $trang = $this->request->query['trang'] ?? 1;
        $sanphams = SanPham::paginate(12, '*', 'trang', $trang);
        $sanphams = stdClassToArray($sanphams);

        $sanphams['data'] = Collection::make($sanphams['data'])
            ->map(function ($sanpham) {
                $danhmucs = DanhMuc::findFirst($sanpham['danhmuc_id']);
                $nhacungcaps= NhaCungCap::findFirst($sanpham['nhacungcap_id']);

                $hinhanhs = HinhAnhSanPham::where('sanpham_id', '=', $sanpham['id'])
                    ->rightJoin('hinhanh', 'hinhanh_sanpham.hinhanh_id', '=', 'hinhanh.id')
                    ->get()
                    ->toArray();
                $sanpham['hinh_anh'] = BASE_URL . '/' . $sanpham['hinh_anh'];
                $hinhanhs = array_map(function ($item) {
                    return get_object_vars($item);
                }, $hinhanhs);

                return array_merge($sanpham, [
                    'danhmucs' => $danhmucs,
                    'nhacungcaps' => $nhacungcaps,
                    'hinhanhs' => $hinhanhs
                ]);
            });
        return json_encode($sanphams);
    }
}
