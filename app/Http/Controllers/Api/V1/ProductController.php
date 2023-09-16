<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    //salam dostan
    public function index()
    {
        $data = DB::table('products')->with(['user'])->orderByDesc('id')->get();

        return $this->successResponse(
            ProductResource::collection($data)
        );
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
            ProductResource::make($product),
            "product store success",
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['user','brand']);
        return $this->successResponse(ProductResource::make($product));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $this->successResponse(
            ProductResource::make($product),
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
