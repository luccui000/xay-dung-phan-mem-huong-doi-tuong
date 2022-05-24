<?php

declare(strict_types=1);
namespace Luccui\Classes;

class Invoice
{
    public function __construct(
        public int $id,
        public string $description,
        public float $amount
    ) {

    }
}
