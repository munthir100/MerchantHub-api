<?php

// app/Http/Requests/CreateSocialLinkRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'facebook' => 'string',
            'instagram' => 'string',
            'twitter' => 'string',
            'tiktok' => 'string',
            'whatsapp' => 'string',
            'snapchat' => 'string',
            'x-platform' => 'string',
            'telegram' => 'string',
            'google_play' => 'string',
            'app_store' => 'string',
        ];
    }
}
