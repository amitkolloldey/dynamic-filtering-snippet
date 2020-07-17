<?php


namespace App\Filtering\Filters;


use Illuminate\Database\Eloquent\Builder;

class FilterByCategory
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereHas('categories', function ($builder) use ($value) {
            $builder->where('slug', $value);
        }); 
    }
}
