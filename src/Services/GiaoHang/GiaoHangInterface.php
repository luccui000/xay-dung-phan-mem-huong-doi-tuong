<?php

namespace Luccui\Services\GiaoHang;

interface GiaoHangInterface
{
    public function tinhPhi(int $xa, int $huyen, int $tinh): int;
}
