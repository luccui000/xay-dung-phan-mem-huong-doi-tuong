<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Core\Session;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;

class DonHangController extends BaseController
{
    public function index()
    {
        $donhangs = DonHang::orderBy('trang_thai', 'desc')->get();

        return view('admin/donhang/index.php', [
            'donhangs' => $donhangs
        ]);
    }
    public function show()
    {
        $id = $this->request->query['id'] ?? null;
        if($id) {
            $donhang = DonHang::where('ma_don_hang', '=', $id)->first();
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $donhang->id)->get();

            return view('admin/donhang/show.php', [
                'donhang' => $donhang,
                'ctdh' => $ctdh
            ]);
        } else {
            return view('admin/errors/404.php');
        }
    }
    public function duyet()
    {
        $donhang = DonHang::where('id', '=', $this->request->donhang_id)
            ->first();
        if($donhang) {
            $trangThai = $donhang->trang_thai;
            switch ($trangThai) {
                case DonHang::DANG_CHO_XAC_NHAN:
                    DonHang::where('id', '=', $this->request->donhang_id)
                        ->update([
                            'trang_thai' => DonHang::DA_XAC_NHAN
                        ]);
                    $trangThai .= DonHang::DA_XAC_NHAN;
                    break;
                case DonHang::DA_XAC_NHAN:
                    DonHang::where('id', '=', $this->request->donhang_id)
                        ->update([
                            'trang_thai' => DonHang::DA_HOAN_THANH
                        ]);
                    $trangThai .= DonHang::DA_HOAN_THANH;
                    break;
                default:
                    break;
            }
            set_session('success', 'Đơn hàng đã chuyển sang '. $trangThai);
            Session::back();
        } else {
            Session::back();
        }
    }
    public function huy()
    {
        $donhang = DonHang::where('id', '=', $this->request->donhang_id)
            ->first();
        if($donhang) {
            DonHang::where('id', '=', $this->request->donhang_id)
                ->update([
                    'trang_thai' => DonHang::DA_HUY
                ]);
            set_session('success', 'Đơn hàng đã được hủy ');
            Session::back();
        } else {
            Session::back();
        }
    }
}
