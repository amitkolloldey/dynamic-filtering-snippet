<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderAble
{

    /**
     * Gets The Categories In Order
     *
     * @param Builder $builder
     */
    public function scopeOrdered(Builder $builder, $direction = 'asc')
    {
        $builder->orderBy('order', $direction);
    }
}
