<?php

namespace Tests\Unit\Models\Categories;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_it_has_many_children()
    {
        $category = factory(Category::class)->create();
        $category->children()->save(
            factory(Category::class)->create()
        );
        $this->assertInstanceOf(Category::class, $category->children->first());
    }


}
