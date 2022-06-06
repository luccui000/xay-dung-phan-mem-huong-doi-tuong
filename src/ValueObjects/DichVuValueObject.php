<?php

namespace Luccui\ValueObjects;

class DichVuValueObject implements ValueObject
{
    public function __construct(
        public int $shop_id,
        public int $from_district,
        public int $to_district
    )
    {
    }

    public function toArray(): array
    {
        return [
            'shop_id' => $this->shop_id,
            'from_district' => $this->from_district,
            'to_district' => $this->to_district,
        ];
    }
}
