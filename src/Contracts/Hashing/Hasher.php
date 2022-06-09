<?php

namespace Luccui\Contracts\Hashing;

interface Hasher
{
    public function make($value, $binary = false): string;
}
