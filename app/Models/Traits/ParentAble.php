<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ParentAble
{

    /**
     * Gets The Parent Categories Only
     *
     * @param Builder $builder
     */
    public function scopeParents(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }
}
