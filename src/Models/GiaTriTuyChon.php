<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class GiaTriTuyChon extends Model
{
    protected $table = 'giatri_tuychon';

    protected array $fillable = [
        'id',
        'sanpham_id',
        'giatri_id'
    ];
}
