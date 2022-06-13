<?php

namespace Luccui\Classes;

use Luccui\Contracts\Hashing\Hasher;

class Hash implements Hasher
{
    public function verify($password, $hash): bool
    {
        return ($this->make($password) == $hash);
    }

    public function make($value, $binary = false): string
    {
        return md5($value, $binary);
    }
    public static function generate($value, $binary = false): string
    {
        return md5($value, $binary);
    }
}
