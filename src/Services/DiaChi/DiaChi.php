<?php

namespace Luccui\Services\DiaChi;
use GuzzleHttp\Client;
use Luccui\Helpers\Config;

class DiaChi implements DiaChiInterface
{
    private Client $client;
    private array $headers = [];

    public function __construct(private Config $config)
    {
        $this->client = new Client([
            'base_uri' => 'https://dev-online-gateway.ghn.vn'
        ]);
        $this->headers = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Token' => $this->config->ghn['token']
            ]
        ];
    }

    public function danhSachTinh()
    {
        $response = $this->client->request('GET',
            '/shiip/public-api/master-data/province',
            $this->headers
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
            "/shiip/public-api/master-data/district?province_id={$maTinh}",
            $this->headers
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
            "/shiip/public-api/master-data/ward?district_id={$maHuyen}",
            $this->headers
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
