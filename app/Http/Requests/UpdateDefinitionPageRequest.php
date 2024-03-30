<?php

// app/Http/Requests/UpdateDefinitionPageRequest.php
namespace App\Http\Requests;

use App\Models\Status;
use Illuminate\Validation\Rule;
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
            'status_id' => ['integer', Rule::in(Status::ACTIVE, Status::NOT_ACTIVE)],
        ];
    }
}
