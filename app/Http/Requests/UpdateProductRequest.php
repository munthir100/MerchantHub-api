<?php

// app/Http/Requests/UpdateProductRequest.php
namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Validation\Rule;
use App\Rules\ProductOptionsRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string',
            'price' => 'numeric|min:0',
            'cost' => 'nullable|numeric',
            'sku' => 'string|unique_in_merchant_store:products,sku,' . request()->route('product')->id,
            'quantity' => 'integer|min:0',
            'is_unlimited' => 'boolean',
            'weight' => 'numeric|min:0',
            'is_discounted' => 'boolean',
            'price_after_discount' => 'required_if:is_discounted,true|numeric|numeric|min:0',
            'shortcut_description' => 'string|max:255',
            'description' => 'string',
            'options' => ['nullable', 'array', new ProductOptionsRule],
            'images.main_image' => 'string',
            'images.sub_images' => 'array',
            'category_id' => 'nullable|integer|exists_in_merchant_store:categories,id',
            'brand_id' => 'nullable|integer|exists_in_merchant_store:brands,id',
            'status_id' => [
                'integer',
                Rule::in(Status::ACTIVE, Status::NOT_ACTIVE)
            ],
        ];
    }
}
