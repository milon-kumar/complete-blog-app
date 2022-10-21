<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs()
    {
        return response()->json([
            'status'    =>200,
            'type'      =>'success',
            'message'   =>'Data Fached',
            'data'      =>Blog::orderBy("created_at",'DESC')->get(),
        ],200);
    }
}
