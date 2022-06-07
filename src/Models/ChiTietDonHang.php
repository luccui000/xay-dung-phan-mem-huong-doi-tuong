<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class ChiTietDonHang extends  Model
{
    protected $table = 'chitiet_donhang';
    protected array $fillable = [
        'id',
        'donhang_id',
        'sanpham_id',
        'ten_san_pham',
        'so_luong',
        'gia',
        'thanh_tien'
    ];
}
