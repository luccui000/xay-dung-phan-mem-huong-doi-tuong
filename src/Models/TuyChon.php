<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class TuyChon extends Model {

    protected array $fillable = [
        'id',
        'sanpham_id',
        'ten_tuy_chon'
    ];
}
