<?php

namespace App\Http\Controllers;

use App\Filtering\Filters\FilterByCategory;
use App\Filtering\Filters\FilterByPrice;
use App\Http\Resources\Product\ProductIndexResource;
use App\Http\Resources\Product\ProductShowResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $input = request()->input();
        return ProductIndexResource::collection(
            Product::withFilters($this->filters())->paginate(1)->appends($input)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProductShowResource
     */
    public function show(Product $product)
    {
        return new ProductShowResource(
            $product
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function filters() : array
    {
        return [
            'category' => new FilterByCategory(),
            'price' => new FilterByPrice(),
        ];
    }
}
