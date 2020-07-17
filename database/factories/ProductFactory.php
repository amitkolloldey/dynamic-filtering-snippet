<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->text(15),
        'slug' => Str::slug($name),
        'price' => $faker->numberBetween(10000,20000),
        'description' => $faker->sentence(250)
    ];
});
