<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use Dflydev\DotAccessData\Data;

class CityController extends Controller
{
    public function index()
    {
        $countries = City::all();
        return $this->responseSuccess(data: CityResource::collection($countries));
    }

    public function show(City $city)
    {
        $city->load('country');
        return $this->responseSuccess(data: new CityResource($city));
    }
}
