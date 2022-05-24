<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class NhaCungCap extends Model
{
    protected array $fillable = [
        'id',
        'ten_nha_cung_cap',
        'ten_lien_he',
        'so_dien_thoai',
        'dia_chi',
        'email',
        'website',
        'ngay_tao',
    ];
}
