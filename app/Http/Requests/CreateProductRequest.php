<?php

// app/Http/Requests/CreateProductRequest.php
namespace App\Http\Requests;

use App\Models\Status;
use App\Rules\ProductOptionsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'price' => 'required|numeric|min:0',
            'cost' => 'required|numeric',
            'sku' => 'string|unique_in_merchant_store:products,sku',
            'quantity' => 'required|integer|min:0',
            'is_unlimited' => 'required|boolean',
            'weight' => 'required|numeric|min:0',
            'is_discounted' => 'boolean',
            'price_after_discount' => 'required_if:is_discounted,true|numeric|numeric|min:0',
            'shortcut_description' => 'required|string|max:255',
            'description' => 'required|string',
            'images.main_image' => 'string',
            'images.sub_images' => 'array',
            'category_id' => 'integer|exists_in_merchant_store:categories,id',
            'brand_id' => 'integer|exists_in_merchant_store:brands,id',
            'status_id' => [
                'required',
                'integer',
                Rule::in(Status::ACTIVE, Status::NOT_ACTIVE)
            ],
            'options'                  => 'sometimes|array',
            'options.*.name'           => 'required_with:options|string',
            'options.*.values'         => 'required_with:options|array',
            'options.*.values.*.name'  => 'required_with:options.*.values|string',
            'options.*.values.*.additional_price'  => 'required_with:options.*.values|string',
            'options.*.values.*.quantity'  => 'required_with:options.*.values|string',
        ];
        // 'options' => [new ProductOptionsRule], // after validation
    }
}
