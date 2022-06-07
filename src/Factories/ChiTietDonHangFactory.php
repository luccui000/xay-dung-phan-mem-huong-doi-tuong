<?php

namespace Luccui\Factories;

use Luccui\ValueObjects\ChiTietDonHangValueObject;

class ChiTietDonHangFactory
{
    public static function make(array $attributes): ChiTietDonHangValueObject
    {
        return new ChiTietDonHangValueObject(
            id: null,
            donhang_id: data_get($attributes, 'donhang_id'),
            sanpham_id: data_get($attributes, 'sanpham_id'),
            ten_san_pham: data_get($attributes, 'ten_san_pham'),
            so_luong: data_get($attributes, 'so_luong'),
            gia: data_get($attributes, 'gia'),
            thanh_tien: data_get($attributes, 'so_luong') * data_get($attributes, 'gia'),
        );
    }
}
