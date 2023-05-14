<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class BooleanFilter extends BaseFilter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        return $query->where($this->inputName, (bool)request()->input($this->inputName));
    }
}
