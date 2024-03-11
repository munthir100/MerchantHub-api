<?php

// app/Http/Requests/UpdateProductRequest.php
namespace App\Http\Requests;

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
            'title' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'cost' => 'sometimes|numeric',
            'sku' => 'sometimes|string|unique_in_merchant_store:products,sku,' . request()->route('product')->id,
            'quantity' => 'sometimes|numeric|min:0',
            'is_unlimited' => 'nullable|boolean',
            'weight' => 'sometimes|numeric|min:0',
            'is_discounted' => 'nullable|boolean',
            'price_after_discount' => 'required_if:is_discounted,true|numeric|min:0',
            'shortcut_description' => 'nullable|string',
            'description' => 'nullable|string',
            'options' => 'nullable|array',
            'images.main_image' => 'sometimes|string',
            'images.sub_images' => 'nullable|array',
            'category_id' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'status_id' => 'sometimes|integer',
        ];
    }
}
