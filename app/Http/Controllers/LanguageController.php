<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Resources\LanguageResource;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $resource = LanguageResource::collection($languages);

        return $this->responseSuccess('Languages retrieved successfully', $resource);
    }
}
