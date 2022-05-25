<?php

namespace Luccui\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $fillable = [
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
    ];
}
