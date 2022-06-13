<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class LuotXem extends Model
{
    protected array $fillable = [
        'id',
        'baiviet_id',
        'so_luong',
        'ngay_lap',
    ];
}
