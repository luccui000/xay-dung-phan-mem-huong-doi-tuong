<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class HinhAnhSanPham extends Model
{
    protected $table = 'hinhanh_sanpham';
    protected array $fillable = [
        'id',
        'sanpham_id',
        'hinhanh_id'
    ];
}
