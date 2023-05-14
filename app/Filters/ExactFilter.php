<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class ExactFilter extends BaseFilter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        $input = Request::input($this->inputName);

        return $query->where($this->inputName, $input);
    }
}
