<?php

namespace Luccui\Http\Controllers;

use Luccui\Models\BaiViet;
use Luccui\Models\LuotXem;
use Luccui\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Collection;

class BaiVietController extends Controller
{
    public function index()
    {
        $baiviets = BaiViet::paginate();
        $baiviets = stdClassToArray($baiviets);
        $data = $baiviets['data'];

        $baiviets = Collection::make($data)
            ->map(function ($baiviet) {
                $baiviet = convertToObject($baiviet);
                $luotxem = LuotXem::where('baiviet_id', '=', $baiviet->id)->count();
                $tacgia = TaiKhoan::findFirst($baiviet->nguoi_tao);
                $baiviet->luot_xem = $luotxem;
                $baiviet->nguoi_tao = $tacgia;
                return $baiviet;
            });
        return view('client/baiviet/index.php', [
            'baiviets' => $baiviets
        ]);
    }
    public function detail()
    {
        $baiviet_id = $this->request->query['id'] ?? null;
        if($baiviet_id) {
            $baiviet = BaiViet::findFirst($baiviet_id);
            return view('client/baiviet/detail.php', [
                'baiviet' => $baiviet,
                'tacgia' => TaiKhoan::findFirst($baiviet_id)
            ]);
        }
    }
}
