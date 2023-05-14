<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class HasRelationFilter extends BaseFilter
{
    /**
     * @param string $inputName
     * @param array $allowRelations
     */
    public function __construct(protected string $inputName, protected array $allowRelations)
    {
        parent::__construct($inputName);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        $relations = Request::input('has');

        if (!is_array($relations)) {
            return $query;
        }

        foreach ($relations as $relation) {
            if (in_array($relation, $this->allowRelations, true)) {
                $query->has($relation);
            }
        }

        return $query;
    }
}
