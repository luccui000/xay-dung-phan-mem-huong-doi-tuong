<?php

namespace Luccui\ValueObjects;

use DateTime;

class DonHangValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string|null $ma_don_hang,
        private int $nguoi_dat,
        private string $ho_nguoi_dat,
        private string $ten_nguoi_dat,
        private int $phi_giao_hang,
        private string $dia_chi,
        private int $thanh_tien,
        private int $tong_tien,
        private string $ma_giam_gia,
        private string $phuong_thuc_thanh_toan,
        private string $ghi_chu,
        private string $trang_thai,
        private string $ngay_dat,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ma_don_hang' => $this->ma_don_hang,
            'nguoi_dat' => $this->nguoi_dat,
            'ho_nguoi_dat' => $this->ho_nguoi_dat,
            'ten_nguoi_dat' => $this->ten_nguoi_dat,
            'phi_giao_hang' => $this->phi_giao_hang,
            'dia_chi' => $this->dia_chi,
            'thanh_tien' => $this->thanh_tien,
            'tong_tien' => $this->tong_tien,
            'ma_giam_gia' => $this->ma_giam_gia,
            'phuong_thuc_thanh_toan' => $this->phuong_thuc_thanh_toan,
            'ghi_chu' => $this->ghi_chu,
            'trang_thai' => $this->trang_thai,
            'ngay_dat' => $this->ngay_dat,
        ];
    }
}
