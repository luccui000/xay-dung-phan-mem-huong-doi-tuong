<?php

namespace Luccui\ValueObjects;

class TaiKhoanValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $ho,
        private string $ten,
        private string $ten_dang_nhap,
        private string $so_dien_thoai,
        private string $email,
        private string|null $mat_khau,
        private string $ngay_tao,
        private string|null $lan_dang_nhap_cuoi,
        private string|null $gioi_thieu,
        private int $quyen
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ho' => $this->ho,
            'ten' => $this->ten,
            'ten_dang_nhap' => $this->ten_dang_nhap,
            'so_dien_thoai' => $this->so_dien_thoai,
            'email' => $this->email,
            'mat_khau' => $this->mat_khau,
            'ngay_tao' => $this->ngay_tao,
            'lan_dang_nhap_cuoi' => $this->lan_dang_nhap_cuoi,
            'gioi_thieu' => $this->gioi_thieu,
            'quyen' => $this->quyen,
        ];
    }
}
