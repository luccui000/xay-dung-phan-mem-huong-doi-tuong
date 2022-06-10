<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class TaiKhoan extends Model
{
    protected array $fillable = [
        'id',
        'ho',
        'ten',
        'ten_dang_nhap',
        'so_dien_thoai',
        'email',
        'mat_khau',
        'ngay_tao',
        'lan_dang_nhap_cuoi',
        'gioi_thieu',
        'quyen',
        'dia_chi',
        'ma_tinh',
        'ma_huyen',
        'ma_xa',
        'ten_cong_ty'
    ];
}
