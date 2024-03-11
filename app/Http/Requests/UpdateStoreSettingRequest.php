<?php

// app/Http/Requests/UpdateStoreSettingRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'settings' => 'sometimes|array',
        ];
    }

}
