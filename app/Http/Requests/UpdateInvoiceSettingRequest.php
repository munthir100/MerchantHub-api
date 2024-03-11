<?php

// app/Http/Requests/UpdateInvoiceSettingRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'settings' => 'sometimes|array',
            'invoice_id' => 'sometimes|integer',
        ];
    }
}
