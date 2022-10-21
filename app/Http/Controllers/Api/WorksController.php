<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function work()
    {
        return response()->json([
           'status'=> 'success',
            'data'=>Service::latest()->get(),
        ],200);
    }
}
