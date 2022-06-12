<?php

namespace Luccui\Helpers;

class Config
{
    protected array $configs = [];

    public function __construct(array $env)
    {
        $this->configs = [
            'db' => [
                'host'      => $env['DB_HOST'],
                'username'  => $env['DB_USERNAME'],
                'password'  => $env['DB_PASSWORD'],
                'database'  => $env['DB_DATABASE'],
                'driver'    => $env['DB_DRIVER'] ?? 'mysql',
            ],
            'ghn' => [
                'shopid' => $env['GIAO_HANG_NHANH_SHOPID'],
                'token' => $env['GIAO_HANG_NHANH_TOKEN'],
                'from_district_id' => $env['GIAO_HANG_NHANH_FROM_DISTRICT_ID']
            ],
            'vnpay' => [
                'code' => $env['VNPAY_TMNCODE'],
                'hash' => $env['VNPAY_HASHSECRET'],
            ],
            'mailer' => [
                'mailer' => $env['MAIL_MAILER'],
                'host' => $env['MAIL_HOST'],
                'port' => $env['MAIL_PORT'],
                'username' => $env['MAIL_USERNAME'],
                'password' => $env['MAIL_PASSWORD'],
                'encryption' => $env['MAIL_ENCRYPTION'],
                'from_address' => $env['MAIL_FROM_ADDRESS'],
                'from_name' => $env['MAIL_FROM_NAME'],
            ]
        ];
    }
    public function __get(string $name)
    {
        if(!key_exists($name, $this->configs))
            return null;
        return $this->configs[$name];
    }
}
