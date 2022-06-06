<?php

namespace Luccui\Services\GiaoHang;

class GiaoHang
{
    public function __construct(private GiaoHangInterface $giaoHang)
    {
    }
    public function phiGiaoHang(int $maXa, int $maHuyen, int $height, int $length, int $weight, int $width, $coupon = null, int $serviceId = 0)
    {
        return $this->giaoHang->tinhPhi($maXa, $maHuyen, $height,  $length,  $weight,  $width, $coupon,  $serviceId);
    }
}
