<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Resources\StatusResource;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        $resource = StatusResource::collection($statuses);

        return $this->responseSuccess('Statuses retrieved successfully', $resource);
    }
}
