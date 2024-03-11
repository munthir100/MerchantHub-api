<?php

// app/Http/Requests/CreateCustomerRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birth_date' => 'date',
            'city_id' => 'integer',
            'gender' => 'string',
            'description' => 'string',
        ];
    }
}
