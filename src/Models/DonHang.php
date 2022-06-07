<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class DonHang extends Model
{
    protected array $fillable = [
        'id',
        'nguoi_dat',
        'ho_nguoi_dat',
        'ten_nguoi_dat',
        'phi_giao_hang',
        'thanh_tien',
        'tong_tien',
        'ma_giam_gia',
        'phuong_thuc_thanh_toan',
        'ghi_chu',
        'trang_thai',
        'ngay_dat',
    ];
}
