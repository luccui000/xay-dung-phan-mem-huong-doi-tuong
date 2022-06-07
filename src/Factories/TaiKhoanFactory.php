<?php

namespace Luccui\Factories;

use Luccui\ValueObjects\TaiKhoanValueObject;

class TaiKhoanFactory
{
    public static function make(array $attributes): TaiKhoanValueObject
    {
        return new TaiKhoanValueObject(
            id: array_key_exists('id', $attributes) ?
                    data_get($attributes, 'id') : null,
            ho: data_get($attributes, 'ho_khach_hang'),
            ten: data_get($attributes, 'ten_khach_hang'),
            ten_dang_nhap: array_key_exists('ten_dang_nhap', $attributes) ?
                    data_get($attributes, 'ten_dang_nhap') :
                    data_get($attributes, 'so_dien_thoai'),
            so_dien_thoai: data_get($attributes, 'so_dien_thoai'),
            email: array_key_exists('email', $attributes) ?
                    data_get($attributes, 'email') : '',
            mat_khau: array_key_exists('mat_khau', $attributes) ?
                        data_get($attributes, 'mat_khau') : '',
            ngay_tao: array_key_exists('ngay_tao', $attributes) ?
                    date('Y/m/d H:i:s', strtotime(data_get($attributes, 'ngay_tao'))) :
                    date("Y/m/d H:i:s"),
            lan_dang_nhap_cuoi: array_key_exists('lan_dang_nhap_cuoi', $attributes) ?
                    date('Y/m/d H:i:s', strtotime(data_get($attributes, 'lan_dang_nhap_cuoi'))) :
                    date("Y/m/d H:i:s"),
            gioi_thieu: array_key_exists('gioi_thieu', $attributes) ?
                    data_get($attributes, 'gioi_thieu') : '',
            quyen: array_key_exists('quyen', $attributes) ?
                data_get($attributes, 'quyen') : 0,
        );
    }
}
