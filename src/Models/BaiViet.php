<?php

namespace Luccui\Models;

use Luccui\Classes\Model;

class BaiViet extends Model
{
    const CONG_BO = "công bố";
    const CHUA_CONG_BO = "chưa công bố";
    const TAM_THOI = "tạm thời";

    protected array $fillable = [
        'id',
        'nguoi_tao',
        'danhmuc_id',
        'hinh_anh',
        'tieu_de',
        'noi_dung',
        'ngay_tao',
        'trang_thai',
        'ngay_cap_nhat',
    ];
}
