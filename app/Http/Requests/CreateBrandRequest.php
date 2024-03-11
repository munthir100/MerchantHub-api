<?php

// app/Http/Requests/CreateBrandRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|integer|exists_in_merchant_store:categories,id',
        ];
    }
}
