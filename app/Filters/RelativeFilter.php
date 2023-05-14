<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class RelativeFilter extends BaseFilter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        return $query->where($this->inputName, 'like', '%'.request()->input($this->inputName).'%');
    }
}
