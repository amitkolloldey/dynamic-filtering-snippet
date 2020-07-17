<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->text(8),
        'slug' => Str::slug($name),
        'description' => $faker->text(250)
    ];
});
