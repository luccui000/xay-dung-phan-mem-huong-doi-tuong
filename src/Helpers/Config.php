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
