<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class RelationFilter extends BaseFilter
{
    /**
     * @param string $inputName
     * @param string $relation
     * @param string $fieldName
     */
    public function __construct(
        protected string $inputName,
        protected string $relation,
        protected string $fieldName = 'id',
    ) {
        parent::__construct($this->inputName);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        $input = Request::input($this->inputName);
        if (!is_array($input)) {
            $input = [$input];
        }

        return $query->whereHas(
            $this->relation,
            fn (Builder $q) => $q->whereIn($this->fieldName, $input)
        );
    }
}
