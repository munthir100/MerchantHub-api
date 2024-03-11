<?php

namespace App\Http\Controllers;

use App\Models\StoreCountry;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CreateStoreCountryRequest;
use App\Models\Country;

class StoreCountryController extends Controller
{
    public function index(): JsonResponse
    {
        $storeCountries = StoreCountry::forAuthMerchantStore()->with('country')->get();

        return $this->responseSuccess('Store countries retrieved successfully', CountryResource::collection($storeCountries));
    }

    public function store(CreateStoreCountryRequest $request): JsonResponse
    {
        $countryIds = $request->input('country_id');

        $storeCountries = [];
        foreach ($countryIds as $countryId) {
            $storeCountries[] = [
                'country_id' => $countryId,
            ];
        }

        request()->user('merchant')->store->countries()->createMany($storeCountries);

        return $this->responseCreated('Store countries created successfully', []);
    }

    public function show(StoreCountry $storeCountry): JsonResponse
    {
        return $this->responseSuccess('Store country retrieved successfully', new CountryResource($storeCountry));
    }

    public function destroy(StoreCountry $storeCountry): JsonResponse
    {
        $storeCountry->delete();

        return $this->responseDeleted();
    }

    public function setAsDefault(StoreCountry $storeCountry)
    {
        $storeCountry->update(['is_default' => true]);

        return $this->responseSuccess('Default country updated');
    }
}
