<?php

namespace Luccui\ValueObjects;

class DatHangValueObject implements ValueObject
{
    public function __construct(
        public int $payment_type_id,
        public string $note,
        public string $required_note,
        public string $return_phone,
        public string $return_address,
        public int $return_district_id,
        public string $return_ward_code,
        public string $client_order_code,
        public string $to_name,
        public string $to_phone,
        public string $to_address,
        public string $to_ward_code,
        public string $to_district_id,
        public int $cod_amount,
        public string $content,
        public int $weight,
        public int $length,
        public int $width,
        public int $height,
        public string $pick_station_id,
        public string $deliver_station_id,
        public int $insurance_value,
        public string $service_id,
        public int $service_type_id,
        public string $coupon,
        public string $pick_shift,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'payment_type_id' => $this->payment_type_id,
            'note' => $this->note,
            'required_note' => $this->required_note,
            'return_phone' => $this->return_phone,
            'return_address' => $this->return_address,
            'return_district_id' => $this->return_district_id,
            'return_ward_code' => $this->return_ward_code,
            'client_order_code' => $this->client_order_code,
            'to_name' => $this->to_name,
            'to_phone' => $this->to_phone,
            'to_address' => $this->to_address,
            'to_ward_code' => $this->to_ward_code,
            'to_district_id' => $this->to_district_id,
            'cod_amount' => $this->cod_amount,
            'content' => $this->content,
            'weight' => $this->weight,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'pick_station_id' => $this->pick_station_id,
            'deliver_station_id' => $this->deliver_station_id,
            'insurance_value' => $this->insurance_value,
            'service_id' => $this->service_id,
            'service_type_id' => $this->service_type_id,
            'coupon' => $this->coupon,
            'pick_shift' => $this->pick_shift,
        ];
    }
}
