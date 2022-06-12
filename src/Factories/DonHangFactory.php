<?php

namespace Luccui\Factories;

use Luccui\Models\DonHang;
use Luccui\ValueObjects\DonHangValueObject;

class DonHangFactory
{
    public static function make(array $attributes): DonHangValueObject
    {
        return new DonHangValueObject(
            id: data_get($attributes, 'id'),
            nguoi_dat: data_get($attributes, 'nguoi_dat'),
            ho_nguoi_dat: data_get($attributes, 'ho_khach_hang'),
            ten_nguoi_dat: data_get($attributes, 'ten_khach_hang'),
            phi_giao_hang: intval(data_get($attributes, 'phi_giao_hang')),
            dia_chi: data_get($attributes, 'dia_chi'),
            thanh_tien: intval(data_get($attributes, 'thanh_tien')),
            tong_tien: intval(data_get($attributes, 'tong_tien')) +
                        intval(data_get($attributes, 'thanh_tien')),
            ma_giam_gia: array_key_exists('ma_giam_gia', $attributes) ?
                data_get($attributes, 'ma_giam_gia') : "",
            phuong_thuc_thanh_toan: array_key_exists('phuong_thuc_thanh_toan', $attributes) ?
                data_get($attributes, 'phuong_thuc_thanh_toan') : 'Nhận hàng',
            ghi_chu: array_key_exists('ghi_chu', $attributes) ?
                data_get($attributes, 'ghi_chu') : "",
            trang_thai: array_key_exists('trang_thai', $attributes) ?
                data_get($attributes, 'trang_thai') : DonHang::DANG_CHO_XAC_NHAN,
            ngay_dat: array_key_exists('ngay_dat', $attributes) ?
                data_get($attributes, 'ngay_dat') : date("Y/m/d H:i:s")
        );
    }
}
