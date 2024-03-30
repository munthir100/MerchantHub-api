<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDefinitionPageRequest;
use App\Http\Requests\UpdateDefinitionPageRequest;
use App\Http\Resources\DefinitionPageResource;
use App\Models\DefinitionPage;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class DefinitionPageController extends Controller
{

    public function index()
    {
        $definitionPages = DefinitionPage::forAuthMerchantStore()->get();
        return $this->responseSuccess(null, DefinitionPageResource::collection($definitionPages));
    }

    public function store(CreateDefinitionPageRequest $request)
    {
        $definitionPage = DefinitionPage::create($request->validated());
        return $this->responseCreated(null, new DefinitionPageResource($definitionPage));
    }

    public function show(DefinitionPage $definitionPage)
    {
        return $this->responseSuccess(null, new DefinitionPageResource($definitionPage));
    }

    public function update(UpdateDefinitionPageRequest $request, DefinitionPage $definitionPage)
    {
        $definitionPage->update($request->validated());
        return $this->responseSuccess(null, new DefinitionPageResource($definitionPage));
    }

    public function destroy(DefinitionPage $definitionPage)
    {
        $definitionPage->delete();
        return $this->responseDeleted();
    }
}
