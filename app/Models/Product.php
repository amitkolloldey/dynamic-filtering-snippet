<?php

namespace App\Models;

use App\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'price',
        'slug'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Gets The Categories For A Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        );
    }

    /**
     * @param Builder $builder
     * @param array $scopes
     * @return Builder
     */
    public function scopeWithFilters(Builder $builder, $filters = [])
    {
        return (new Filter(request()))->apply($builder, $filters);
    }
}

