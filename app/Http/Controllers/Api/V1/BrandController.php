<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Brand::orderBy('id','desc')->get();
        return $this->successResponse(
            BrandResource::collection($data),
            'نمایش برندها');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data=$request->validated();
        $brand = Brand::create($data);

        return $this->successResponse(
            BrandResource::make($brand),
            "با موفقیت ایجاد شد",
            201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand->load(['products']);
        return $this->successResponse(BrandResource::make($brand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return $this->successResponse(
            BrandResource::make($brand),
            "آبدیت با موفقیت انجام شد");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        return $this->successResponse(
            $brand->delete(),
            'این برند پاک شد');
    }
}
