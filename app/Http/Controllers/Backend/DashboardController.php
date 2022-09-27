<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard.dashboard',[
            'totalCategory'=>Category::all()->count(),
            'totalTags'=>Tag::all()->count(),
            'totalBlog'=>Blog::all()->count(),
            'totalPublishedBlog'=>Blog::where('status',true)->count(),
            'totalUnpublishedBlog'=>Blog::where('status',false)->count(),
            'user'=>User::where('is_admin',false)->count(),
            'totalConnents'=>Comment::all()->count(),
            'latestComments'=>Comment::latest()->get(),
            'mostPopularBlogs'=>Blog::where('status',1)->orderBy('view_count','DESC')->limit(10)->get(),
            'latestCategory'=>Category::orderBy('created_at','DESC')->limit(5)->get(),
            'mostViewBlog'=>Blog::where('status',1)->orderBy('view_count','DESC')->limit(10)->get(),
            'totalSubscriber'=>Subscribe::all()->count(),
        ]);
    }
}
