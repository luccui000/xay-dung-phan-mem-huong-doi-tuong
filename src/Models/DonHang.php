<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class DonHang extends Model
{
    const DANG_CHO_XAC_NHAN ='đang chờ xác nhận';
    const DA_XAC_NHAN = 'đã xác nhận';
    const DA_HOAN_THANH = 'đã hoàn thành';
    const DA_HUY = 'đã hủy';
    const THANH_TOAN_KHI_NHAN_HANG = "Thanh toán khi nhận hàng";
    const THANH_TOAN_QUA_THE = "Thẻ ngân hàng";

    protected array $fillable = [
        'id',
        'ma_don_hang',
        'nguoi_dat',
        'ho_nguoi_dat',
        'ten_nguoi_dat',
        'phi_giao_hang',
        'dia_chi',
        'thanh_tien',
        'tong_tien',
        'ma_giam_gia',
        'phuong_thuc_thanh_toan',
        'ghi_chu',
        'trang_thai',
        'ngay_dat',
    ];
}
