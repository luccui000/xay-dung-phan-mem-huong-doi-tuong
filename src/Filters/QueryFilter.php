<?php

namespace Luccui\Filters;

use Illuminate\Database\Eloquent\Builder;
use Luccui\Core\Request;

abstract class QueryFilter
{
    protected Request $request;
    protected Builder $builder;
    protected array $fillable;

    public function __construct()
    {
        $this->request = app(Request::class);
        $this->fillable = $this->getModelFillable();

        foreach ($this->filters() as $method => $value) {
            if(method_exists($this, $method)) {
                call_user_func_array([$this, $method],array_filter([$value]));
            }
        }
        return $this->builder;
    }
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
    }
    public function filters()
    {
        return $this->request->all();
    }
    public function getModelFillable()
    {
        $model = $this->builder->getModel();
        return $model->getFillable();
    }
}
