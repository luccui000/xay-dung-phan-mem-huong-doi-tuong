<?php

namespace Luccui\ValueObjects;

class ChiTietDonHangValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private int $donhang_id,
        private int $sanpham_id,
        private string $ten_san_pham,
        private int $so_luong,
        private float $gia,
        private float $thanh_tien,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'donhang_id' => $this->donhang_id,
            'sanpham_id' => $this->sanpham_id,
            'ten_san_pham' => $this->ten_san_pham,
            'so_luong' => $this->so_luong,
            'gia' => $this->gia,
            'thanh_tien' => $this->thanh_tien
        ];
    }
}
