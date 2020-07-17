<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::apiResources( [
    'categories' => 'CategoryController',
    'products' => 'ProductController',
]);
