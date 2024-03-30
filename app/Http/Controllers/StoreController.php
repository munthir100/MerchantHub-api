<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use App\Http\Resources\SocialLinkResource;

class StoreController extends Controller
{
    public function index()
    {
        return $this->responseSuccess(data: new StoreResource($this->store()));
    }

    public function update(UpdateStoreRequest $request)
    {
        $store = $this->store()->update($request->validated());

        return $this->responseSuccess('Store updated successfully.', new StoreResource($store));
    }

    public function socialLinks()
    {
        $socialLinks = $this->store()->socialLinks()->get(); // last point

        return $this->responseSuccess(data: new SocialLinkResource($socialLinks));
    }

    public function updateSocialLinks(UpdateSocialLinkRequest $request)
    {
        $socialLinks = $this->store()->socialLinks()->update($request->validated());

        return $this->responseSuccess('Social links updated successfully.', new StoreResource($socialLinks));
    }

    protected function store()
    {
        return request()->user('merchant')->store()->first();
    }
}
