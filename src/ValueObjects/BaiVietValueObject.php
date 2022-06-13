<?php

namespace Luccui\ValueObjects;

class BaiVietValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private int|null $nguoi_tao,
        private int|null $danhmuc_id,
        private string $hinh_anh,
        private string $tieu_de,
        private string $noi_dung,
        private string $ngay_tao,
        private string $trang_thai,
        private string $ngay_cap_nhat
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nguoi_tao' => $this->nguoi_tao,
            'danhmuc_id' => $this->danhmuc_id,
            'hinh_anh' => $this->hinh_anh,
            'tieu_de' => $this->tieu_de,
            'noi_dung' => $this->noi_dung,
            'ngay_tao' => $this->ngay_tao,
            'trang_thai' => $this->trang_thai,
            'ngay_cap_nhat' => $this->ngay_cap_nhat
        ];
    }
}
