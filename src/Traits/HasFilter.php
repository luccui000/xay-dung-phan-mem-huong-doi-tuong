<?php

namespace Luccui\Traits;

use Illuminate\Database\Query\Builder;
use Luccui\Filters\QueryFilter;

trait HasFilter
{
    public function scopeFilter(Builder $builder, QueryFilter $queryFilter) {
        return $queryFilter->apply($builder);
    }
}
