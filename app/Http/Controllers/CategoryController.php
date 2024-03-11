<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::forAuthMerchantStore()->get();
        return $this->responseSuccess(data: CategoryResource::collection($categories));
    }

    public function show(Category $category)
    {
        return $this->responseSuccess(data: new CategoryResource($category));
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return $this->responseCreated('Category created successfully', new CategoryResource($category));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return $this->responseSuccess('Category updated successfully', new CategoryResource($category));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->responseDeleted();
    }
}
