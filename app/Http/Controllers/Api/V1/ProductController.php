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
    //salam dostan
    public function index()
    {
        return Product::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $product = Product::create([
            'user_id'     => auth()->id(),
            'category_id' => $request->input('category_id'),
            'brand_id'    => $request->input('brand_id'),
            'title'       => $request->input('title'),
            'body'        => $request->input('body'),
            'inventory'   => $request->input('inventory', 0),
            'price'       => $request->input('price'),
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'integer|required',
            'brand_id'    => 'integer|required',
            'title'       => 'required|string',
            'body'        => 'required|string',
            'price'       => 'required|numeric',
        ]);

        $data['user_id'] = auth()->id();
        if (empty($data['inventory'])) {
            return $this->errorResponse('product inventory can not empty');
        }
        $data['inventory'] = $request->input('inventory', 0);
        $product->update($data);

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
