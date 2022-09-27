<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.home.home',[
            'blogs'=>Blog::where('status',1)->get(),
            'slider_blog'=>Blog::where('status',1)->inRandomOrder()->first(),
            'latest_blog'=>Blog::where('status',1)->orderBy('created_at','DESC')->paginate(5),
            'categories'=>Category::where('status',1)->inRandomOrder()->limit(10)->get(),
            'popular_blog'=>Blog::where('status',1)->orderBy('view_count','DESC')->limit(3)->get(),
        ]);
    }
}
