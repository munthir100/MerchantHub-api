<?php

// app/Http/Requests/UpdateDefinitionPageRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDefinitionPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'details' => 'sometimes|string',
            'status_id' => 'sometimes|integer',
        ];
    }
}
