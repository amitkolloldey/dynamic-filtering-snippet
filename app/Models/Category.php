<?php

namespace App\Models;

use App\Models\Traits\OrderAble;
use App\Models\Traits\ParentAble;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ParentAble, OrderAble;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'order'
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
     * Gets the children categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(
            Category::class,
            'parent_id',
            'id'
        );
    }

    /**
     * Gets The Products For A Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'category_product',
            'category_id',
            'product_id'
        );
    }
}
