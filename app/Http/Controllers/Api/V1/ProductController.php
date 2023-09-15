<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $product = Product::create($data);

        return $this->successResponse(
            $product,
            "product store success",
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->successResponse($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $this->successResponse(
            $product,
            "product update success"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return $this->successResponse(
            $product->delete(),
            'product deleted'
        );
    }
}
