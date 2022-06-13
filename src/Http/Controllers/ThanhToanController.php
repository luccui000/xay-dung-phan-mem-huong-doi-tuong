<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Cart;
use Luccui\Classes\XacThuc;
use Luccui\Core\Request;
use Luccui\Core\Session;
use Luccui\Core\Str;
use Luccui\Factories\ChiTietDonHangFactory;
use Luccui\Factories\DonHangFactory;
use Luccui\Factories\TaiKhoanFactory;
use Luccui\Factories\VNPayFactory;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;
use Luccui\Models\TaiKhoan;
use Luccui\Services\DiaChi\DiaChi;
use Luccui\Services\ThanhToan\ThanhToanGateway;
use Luccui\ValueObjects\VNPayValueObject;
use function PHPUnit\Framework\matches;

class ThanhToanController
{
    public function checkout()
    {
        $tinhs = app(DiaChi::class)->danhSachTinh();

        return view('client/sanpham/thanh-toan.php', [
            'tinhs' => $tinhs
        ]);
    }
    public function confirm()
    {
        $request = app(Request::class);
        $formData = $request->all();
        $formData['phuong_thuc_thanh_toan'] = match ($formData['phuong_thuc_thanh_toan']) {
            'online' => DonHang::THANH_TOAN_QUA_THE,
            default => DonHang::THANH_TOAN_KHI_NHAN_HANG,
        };
        $donhang_id = $this->saveDonHang($formData);

        $cart = app(Cart::class)->getItems();
        foreach ($cart as $items) {
            foreach ($items as $item) {
                $this->saveChiTietDonHang($donhang_id, $item);
            }
        }

        $donhang = DonHang::where('id', '=', $donhang_id)->first();

        if($request->phuong_thuc_thanh_toan == "online") {
            $data = $request->all();
            $data['donhang_id'] = $donhang_id;
            $this->makePurchase($data);
        }
        app(Cart::class)->clear();
        return view("client/sanpham/dat-hang-thanh-cong.php", [
            'donhang' => $donhang
        ]);
    }
    public function saveDonHang($data)
    {
        if(!Session::has(XacThuc::SESSION_DA_DANG_NHAP)) {
            $khachhang_id = TaiKhoan::insertGetId(
                TaiKhoanFactory::make($data)->toArray());
        } else {
            $khachhang_id = Session::get(XacThuc::SESSION_ID_TAI_KHOAN);
            $newValueKhachHang = TaiKhoanFactory::make($data)->toArray();
            unset($newValueKhachHang['id']);
            unset($newValueKhachHang['ten_dang_nhap']);
            TaiKhoan::where('id', '=', $khachhang_id)
                ->update($newValueKhachHang);
        }
        return DonHang::insertGetId(DonHangFactory::make(
            array_merge([
                'nguoi_dat' => $khachhang_id
            ], $data)
        )->toArray());
    }
    public function saveChiTietDonHang($donhang_id, $data)
    {
        ChiTietDonHang::insert(ChiTietDonHangFactory::make([
            'sanpham_id' => $data['id'],
            'donhang_id' => $donhang_id,
            'ten_san_pham' => $data['attributes']['ten_san_pham'],
            'so_luong' => $data['quantity'],
            'gia' => $data['attributes']['gia_cuoi_cung'],
        ])->toArray());
    }
    public function makePurchase($data)
    {
        app(ThanhToanGateway::class)->taoUrl(
            VNPayFactory::make($data)->toArray()
        );
    }
    public function callback()
    {
        $request = app(Request::class);
        $donhang = DonHang::where('id', '=', $request->query['vnp_TxnRef'])->first();

        return view("client/sanpham/dat-hang-thanh-cong.php", [
            'donhang' => $donhang
        ]);
    }
}
