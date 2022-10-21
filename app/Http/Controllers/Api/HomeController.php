<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function blog()
    {
        return response()->json([
            'type'=>true,
            'message'=>'Data Fached',
            'data'=>Blog::with('tags')->latest()->limit(4)->get(),
        ],200);
    }
}
