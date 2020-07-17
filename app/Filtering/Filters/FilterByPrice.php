<?php


namespace App\Filtering\Filters;


use Illuminate\Database\Eloquent\Builder;

class FilterByPrice
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        $price_range = explode(',', trim($value));

        if (isset($price_range) && (count($price_range) == 2)) {
            $min = $price_range[0];
            $max = $price_range[1];
            return $builder->whereBetween('price', [$min, $max]);
        }

        return $builder;
    }
}
