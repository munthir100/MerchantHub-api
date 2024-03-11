<?php

// app/Http/Requests/UpdateCustomerRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|string',
            'birth_date' => 'nullable|date',
            'city_id' => 'nullable|integer',
            'gender' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }
}
