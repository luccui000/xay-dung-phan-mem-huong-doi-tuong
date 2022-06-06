<?php

namespace Luccui\Services\GiaoHang;

interface GiaoHangInterface
{
    public function tinhPhi(int $xa, int $huyen, int $height, int $length, int $weight, int $width, $coupon = null, int $serviceId = 0);
}
