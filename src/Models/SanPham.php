<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class SanPham extends Model
{
    protected array $fillable = [
        'id',
        'ma_san_pham',
        'danhmuc_id',
        'nhacungcap_id',
        'ten_san_pham',
        'gia_truoc_khuyen_mai',
        'gia_sau_khuyen_mai',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'san_pham_noi_bat',
        'san_pham_giam_gia',
        'gia_khuyen_mai',
        'so_luong_nhap',
        'ngay_tao',
        'nguoi_tao',
        'trang_thai'
    ];

}
