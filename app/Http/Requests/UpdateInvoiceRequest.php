<?php

// app/Http/Requests/UpdateInvoiceRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_id' => 'sometimes|integer',
        ];
    }
}
