<?php

// app/Http/Requests/UpdateSocialLinkRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'snapchat' => 'nullable|string',
            'x-platform' => 'nullable|string',
            'telegram' => 'nullable|string',
            'google_play' => 'nullable|string',
            'app_store' => 'nullable|string',
        ];
    }
}
