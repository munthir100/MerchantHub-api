<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\StoreResource;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\UpdateSocialLinkRequest;

class StoreController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function show()
    {
        $store = request()->user('merchant')->store();

        return $this->responseSuccess('Store retrieved successfully.', new StoreResource($store));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStoreRequest $request
     * @return JsonResponse
     */
    public function update(UpdateStoreRequest $request)
    {
        $store = request()->user('merchant')->store();
        $store->update($request->validated());

        return $this->responseSuccess('Store updated successfully.', new StoreResource($store));
    }

    /**
     * Update social links for the specified store.
     *
     * @param UpdateSocialLinkRequest $request
     * @return JsonResponse
     */
    public function updateSocialLinks(UpdateSocialLinkRequest $request)
    {
        $store = request()->user('merchant')->store();
        $store->socialLinks()->update($request->validated());

        return $this->responseSuccess('Social links updated successfully.', new StoreResource($store));
    }
}
