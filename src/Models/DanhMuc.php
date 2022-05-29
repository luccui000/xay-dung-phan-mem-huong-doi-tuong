<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmuc';
    protected array $fillable = [
        'id',
        'ten_danh_muc',
        'hinh_anh',
        'thu_tu',
        'noi_bat',
        'ngay_tao'
    ];
}
