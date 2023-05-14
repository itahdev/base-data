<?php

namespace App\Filters\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

trait Filterable
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeFilter(Builder $query): Builder
    {
        $criteria = $this->filterCriteria();

        return app(Pipeline::class)
            ->send($query)
            ->through($criteria)
            ->thenReturn();
    }

    /**
     * @return array
     */
    public function filterCriteria(): array
    {
        if (method_exists($this, 'getFilters')) {
            return $this->getFilters();
        }

        return [];
    }
}
