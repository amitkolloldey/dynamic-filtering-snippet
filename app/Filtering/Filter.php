<?php

namespace App\Filtering;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filter
{
    protected $request;

    /**
     * Filter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @param array $filters
     * @return Builder
     */
    public function apply(Builder $builder, array $filters)
    {
        foreach ($filters as $key => $filter) {
            $query_key = $this->request->get($key);
            if (isset($query_key)) {
                $filter->apply($builder, $query_key);
            }
        }
        return $builder;
    }
}
