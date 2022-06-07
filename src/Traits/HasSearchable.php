<?php

namespace Luccui\Traits;

trait HasSearchable
{
    public function search($keyword)
    {
        foreach ($this->fillable as $attribute) {
            $this->builder = $this->builder->where($attribute, 'LIKE', "%$keyword%");
        }
        return $this->builder;
    }
}
