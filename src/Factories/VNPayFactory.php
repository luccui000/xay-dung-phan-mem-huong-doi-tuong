<?php

namespace Luccui\Factories;

use Luccui\Core\Str;
use Luccui\ValueObjects\VNPayValueObject;

class VNPayFactory
{
    public static function make(array $attributes): VNPayValueObject
    {
        return new VNPayValueObject(
            TxnRef: 5,
            OrderInfo: 'Thanh toan hoa don hang hoa, so tien: ' . vnmoney(data_get($attributes, 'thanh_tien')),
            OrderType:  array_key_exists('loai_thanh_toan', $attributes) ?
                    data_get($attributes, 'loai_thanh_toan') : 'thanhtoan',
            Amount: array_key_exists('thanh_tien', $attributes) ?
                +data_get($attributes, 'thanh_tien') : 0,
            Locale: array_key_exists('loai_thanh_toan', $attributes) ?
                data_get($attributes, 'loai_thanh_toan') : 'vn',
            BankCode: array_key_exists('ma_ngan_hang', $attributes) ?
                data_get($attributes, 'ma_ngan_hang') : '',
            ExpireDate: date("YmdHis"),
            Bill_Mobile: $attributes['so_dien_thoai'],
            Bill_Email: array_key_exists('email', $attributes) ?
                data_get($attributes, 'email') : '',
            fullName: $attributes['ho_khach_hang'] . ' ' . $attributes['ten_khach_hang'],
            Bill_Address: $attributes['dia_chi'],
            Bill_City: array_key_exists('donhang_tinh', $attributes) ?
                data_get($attributes, 'donhang_tinh') : '',
            Bill_Country: array_key_exists('donhang_thanh_pho', $attributes) ?
                data_get($attributes, 'donhang_thanh_pho') : '',
            Bill_State: array_key_exists('donhang_trang_thai', $attributes) ?
                data_get($attributes, 'donhang_trang_thai') : '',
            Inv_Phone: $attributes['so_dien_thoai'],
            Inv_Email: array_key_exists('email', $attributes) ?
                data_get($attributes, 'email') : '',
            Inv_Customer: $attributes['ho_khach_hang'] . $attributes['ten_khach_hang'],
            Inv_Address: $attributes['dia_chi'],
            Inv_Company: array_key_exists('ten_cong_ty', $attributes) ?
                data_get($attributes, 'ten_cong_ty') : '',
            Inv_Taxcode: array_key_exists('ma_ngan_hang', $attributes) ?
                data_get($attributes, 'ma_ngan_hang') : '',
            Inv_Type: array_key_exists('ma_ngan_hang', $attributes) ?
                data_get($attributes, 'ma_ngan_hang') : '',
        );
    }
}
