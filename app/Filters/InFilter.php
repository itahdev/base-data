<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class InFilter extends BaseFilter
{
    /**
     * @param string $inputName
     * @param string $fieldName
     */
    public function __construct(protected string $inputName, protected string $fieldName = '')
    {
        if (!$fieldName) {
            $this->fieldName = $inputName;
        }

        parent::__construct($inputName);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function apply(Builder $query): Builder
    {
        $input = Request::input($this->inputName);

        return $query->whereIn($this->fieldName, $input);
    }
}
