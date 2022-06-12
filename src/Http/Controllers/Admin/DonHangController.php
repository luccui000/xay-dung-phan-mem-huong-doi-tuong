<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;

class DonHangController extends BaseController
{
    public function index()
    {
        $donhangs = DonHang::all();

        return view('admin/donhang/index.php', [
            'donhangs' => $donhangs
        ]);
    }
    public function show()
    {
        $id = $this->request->query['id'] ?? null;
        if($id) {
            $donhang = DonHang::where('id', '=', $id)->first();
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $id)->get();

            return view('admin/donhang/show.php', [
                'donhang' => $donhang,
                'ctdh' => $ctdh
            ]);
        } else {
            return view('admin/errors/404.php');
        }
    }
}
