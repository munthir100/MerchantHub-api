<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::forAuthMerchantStore()->get();

        return $this->responseSuccess(data: ProductResource::collection($products));
    }

    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        return $this->responseCreated('Product created successfully', new ProductResource($product));
    }

    public function show(Product $product)
    {
        return $this->responseSuccess(data: new ProductResource($product));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return $this->responseSuccess('Product updated successfully', new ProductResource($product));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return $this->responseDeleted();
    }
}
