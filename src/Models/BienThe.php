<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class BienThe extends Model {

    protected array $fillable = [
        'id',
        'sanpham_id',
        'gia_von',
        'gia_khuyen_mai',
        'so_luong_nhap',
        'khoi_luong'
    ];
}
