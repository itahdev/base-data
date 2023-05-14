<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

abstract class BaseMultiFilter
{
    /**
     * @param array $inputName
     * @param bool $accepted
     */
    public function __construct(protected array $inputName, protected bool $accepted = false)
    {
    }

    /**
     * @param Builder $query
     * @param Closure $next
     * @return Builder
     */
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->accepted || Request::hasAny($this->inputName)) {
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
