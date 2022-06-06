<?php

namespace Luccui\Services\GiaoHang;

use GuzzleHttp\Client;
use Luccui\Helpers\Config;
use Luccui\ValueObjects\DonHangValueObject;

class GiaoHangNhanh implements GiaoHangInterface
{
    private Client $client;
    private array $headers = [];

    public function __construct(private Config $config)
    {
        $this->client = new Client([
            'base_uri' => 'https://dev-online-gateway.ghn.vn'
        ]);
        $this->headers = [
            'Content-Type' => 'application/json',
            'Token' => $this->config->ghn['token'],
            'ShopId' => $this->config->ghn['shopid'],
        ];
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tinhPhi(int $xa, int $huyen, int $height, int $length, int $weight, int $width, $coupon = null, int $serviceId = 0)
    {
        $dichvus = $this->layDichVu($huyen);
        $response = $this->client->post(
            "/shiip/public-api/v2/shipping-order/fee", [
                'headers' => $this->headers,
                'json' => [
                    'from_district_id' => +$this->config->ghn['from_district_id'],
                    'service_id' => $dichvus[$serviceId]['service_id'],
                    'service_type_id' => 2,
                    'to_district_id' => +$huyen,
                    'to_ward_code' => $xa,
                    'height' => $height,
                    'length' => $length,
                    'weight' => $weight,
                    'width' => $width,
                    'insurance_value' => 10000,
                    'coupon' =>  $coupon
                ]
            ]
        );

        $body = $response->getBody();
        $contents = json_decode($body->getContents());

        return [
            'total' => $contents->data->service_fee,
            'service_fee' => $contents->data->service_fee,
            'insurance_fee' => $contents->data->insurance_fee,
            'pick_station_fee' => $contents->data->pick_station_fee,
            'coupon_value' => $contents->data->coupon_value,
            'r2s_fee' => $contents->data->r2s_fee
        ];
    }
    public function layDichVu($maHuyen)
    {
        $response = $this->client->post(
            '/shiip/public-api/v2/shipping-order/available-services', [
                'headers' => $this->headers,
                'json' => [
                    'shop_id' => +$this->config->ghn['shopid'],
                    'from_district' => +$this->config->ghn['from_district_id'],
                    'to_district' => $maHuyen
                ]
            ]
        );
        $body = $response->getBody();
        $contents = json_decode($body->getContents());

        return array_map(function($item) {
            return [
                'service_id' => $item->service_id,
                'short_name' => $item->short_name,
                'service_type_id' => $item->service_type_id,
            ];
        }, $contents->data);
    }
    public function taoDonHang()
    {
        $donhang = new DonHangValueObject(
            payment_type_id: 2,
            note: "",
            required_note: "",
            return_phone: "",
            return_address: "",
            return_district_id: 0,
            return_ward_code: "",
            client_order_code: "",
            to_name: "",
            to_phone: "",
            to_address: "",
            to_ward_code: "",
            to_district_id: 0,
            cod_amount: 0,
            content: "",
            weight: 0,
            length: 0,
            width: "",
            height: 0,
            pick_station_id: "",
            deliver_station_id: "",
            insurance_value: "",
            service_id: 0,
            service_type_id: 0,
            coupon: 0,
            pick_shift: 0
        );
        $response = $this->client->post(
            "/shiip/public-api/v2/shipping-order/create", [
                'headers' => $this->headers,
                'json' => $donhang->toArray()
            ]
        );
    }
    public function danhSachTinh()
    {
        $response = $this->client->request('GET',
            '/shiip/public-api/master-data/province', [
                'headers' => $this->headers
            ]
        );
        $body = $response->getBody();
        $contents = json_decode($body->getContents());

        return array_map(function ($item) {
            return [
                'id' => $item->ProvinceID,
                'name' => $item->ProvinceName
            ];
        }, $contents->data);
    }

    public function danhSachHuyen($maTinh)
    {
        $response = $this->client->request('GET',
            "/shiip/public-api/master-data/district?province_id={$maTinh}", [
                'headers' => $this->headers
            ]
        );
        $body = $response->getBody();
        $contents = json_decode($body->getContents());

        return array_map(function($item) {
            return [
                'id' => $item->DistrictID,
                'name' => $item->DistrictName
            ];
        }, $contents->data);
    }
    public function danhSachXa($maHuyen)
    {
        $response = $this->client->request('GET',
            "/shiip/public-api/master-data/ward?district_id={$maHuyen}", [
                'headers' => $this->headers
            ]
        );
        $body = $response->getBody();
        $contents = json_decode($body->getContents());

        return array_map(function($item) {
            return [
                'id' => $item->WardCode,
                'name' => $item->WardName
            ];
        }, $contents->data);
    }
}
