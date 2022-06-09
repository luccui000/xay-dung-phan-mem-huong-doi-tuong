<?php

namespace Luccui\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Connection;

class Database
{
    private Capsule $capsule;

    public function __construct(array $config)
    {
        $this->capsule = new Capsule();
        $this->capsule->addConnection([
            'driver'    => $config['driver'],
            'host'      => $config['host'],
            'database'  => $config['database'],
            'username'  => $config['username'],
            'password'  => $config['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]);
        $this->capsule->setAsGlobal();
    }

    public function getConnection(): Connection
    {
        return $this->capsule->getConnection();
    }
}
