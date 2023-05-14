<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

abstract class BaseFilter
{
    /**
     * @param string $inputName
     */
    public function __construct(protected string $inputName)
    {
    }

    /**
     * @param Builder $query
     * @param Closure $next
     * @return Builder
     */
    public function handle(Builder $query, Closure $next): Builder
    {
        if (Request::has($this->inputName)) {
            $query = $this->apply($query);
        }

        return $next($query);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    abstract protected function apply(Builder $query): Builder;
}
