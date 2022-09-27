<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function category()
    {
        return view('frontend.category.category',[
            'blogs' => Blog::where('status',1)->orderBy('created_at','DESC')->with('category','user')->paginate(10),
            'popular_blog'=>Blog::with('user')->where('status',1)->orderBy('view_count','DESC')->limit(3)->get(),
            'categories'=>Category::where('status',1)->inRandomOrder()->limit(10)->get(),
        ]);


    }

    public function categoryBlog($slug , $id)
    {

        return view('frontend.category.category',[
            'blogs'=>Blog::Where('status',1)->where('category_id',$id)->orderBy('created_at','DESC')->with('category','user')->paginate(10),
            'popular_blog'=>Blog::with('user')->where('status',1)->orderBy('view_count','DESC')->limit(3)->get(),
            'categories'=>Category::where('status',1)->inRandomOrder()->limit(10)->get(),
        ]);
    }
}
