<?php

namespace Luccui\Factories;

use Luccui\Models\BaiViet;
use Luccui\ValueObjects\BaiVietValueObject;

class BaiVietFactory
{
    public static function make(array $attributes): BaiVietValueObject
    {
        return new BaiVietValueObject(
            id: array_key_exists('id', $attributes) ?
                data_get($attributes, 'id') : null,
            nguoi_tao: array_key_exists('nguoi_tao', $attributes) ?
                data_get($attributes, 'nguoi_tao') : null,
            danhmuc_id: array_key_exists('danhmuc_id', $attributes) ?
                data_get($attributes, 'danhmuc_id') : null,
            hinh_anh: array_key_exists('hinh_anh', $attributes) ?
                data_get($attributes, 'hinh_anh') : '',
            tieu_de: data_get($attributes, 'tieu_de'),
            noi_dung: data_get($attributes, 'noi_dung'),
            ngay_tao: array_key_exists('ngay_tao', $attributes) ?
                data_get($attributes, 'ngay_tao') : date('Y/m/d h:i:s'),
            trang_thai: array_key_exists('trang_thai', $attributes) ?
                data_get($attributes, 'trang_thai') : BaiViet::CONG_BO,
            ngay_cap_nhat: array_key_exists('ngay_cap_nhat', $attributes) ?
                data_get($attributes, 'ngay_cap_nhat') : date('Y/m/d h:i:s')
        );
    }
}
