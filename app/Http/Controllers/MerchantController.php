<?php

namespace App\Http\Controllers;

use App\Http\Resources\MerchantResource;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    function profile()
    {
        return $this->responseSuccess(data: [new MerchantResource(request()->user('merchant'))]);
    }
}
