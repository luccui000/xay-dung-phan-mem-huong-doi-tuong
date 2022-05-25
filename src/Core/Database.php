<?php

namespace Luccui\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct(array $config)
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => $config['driver'],
            'host'      => $config['host'],
            'database'  => $config['database'],
            'username'  => $config['username'],
            'password'  => $config['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]);
        $capsule->setAsGlobal();
    }
}
