<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $resource = CurrencyResource::collection($currencies);

        return $this->responseSuccess('Currencies retrieved successfully', $resource);
    }
}
