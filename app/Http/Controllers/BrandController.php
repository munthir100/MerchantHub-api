<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Resources\BrandResource;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::forAuthMerchantStore()->get();
        return $this->responseSuccess(data: BrandResource::collection($brands));
    }

    public function show(Brand $brand)
    {
        return $this->responseSuccess(data: new BrandResource($brand));
    }

    public function store(CreateBrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return $this->responseCreated('Brand created successfully', new BrandResource($brand));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return $this->responseSuccess('Brand updated successfully', new BrandResource($brand));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return $this->responseDeleted();
    }
}
