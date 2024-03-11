<?php

namespace App\Http\Controllers;

use App\Models\StoreTheme;
use Illuminate\Http\Request;
use App\Http\Resources\StoreThemeResource;

class StoreThemeController extends Controller
{
    public function index()
    {
        $storeThemes = StoreTheme::all();
        return $this->responseSuccess(data: StoreThemeResource::collection($storeThemes));
    }
}
