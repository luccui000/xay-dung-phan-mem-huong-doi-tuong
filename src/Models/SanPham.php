<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class SanPham extends Model
{
    const TOTAL_IMAGE_UPLOAD  = 4;
    protected $table = 'sanpham';

    protected array $fillable = [
        'id',
        'hinh_anh',
        'ma_san_pham',
        'danhmuc_id',
        'nhacungcap_id',
        'ten_san_pham',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'gia_cuoi_cung',
        'gia_san_pham',
        'la_san_pham_noi_bat',
        'la_san_pham_giam_gia',
        'la_san_pham_moi',
        'ngay_tao',
        'nguoi_tao',
        'trang_thai',
    ];
}
