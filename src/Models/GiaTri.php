<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class GiaTri extends Model {

    protected array $fillable = [
        'id',
        'sanpham_id',
        'tuychon_id',
        'ten_gia_tri'
    ];
}
