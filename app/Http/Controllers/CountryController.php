<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CountryResource;
use Dflydev\DotAccessData\Data;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return $this->responseSuccess(data: CountryResource::collection($countries));
    }

    public function show(Country $country)
    {
        $country->load('cities','currency','language');
        return $this->responseSuccess(data: new CountryResource($country));
    }
}
