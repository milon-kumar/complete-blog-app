<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services()
    {
        return response()->json([
            'status'    =>true,
            'type'      =>'success',
            'data'      =>Service::latest()->get(),
        ],200);
    }
}
