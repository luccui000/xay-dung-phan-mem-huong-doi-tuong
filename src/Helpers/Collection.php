<?php

namespace Luccui\Helpers;

use ArrayIterator;
use IteratorAggregate;

class Collection implements IteratorAggregate
{
    public function __construct(
        protected array $invoices
    ) {
    }

    public function getIterator()
    {
        return new ArrayIterator($this->invoices);
    }
}
