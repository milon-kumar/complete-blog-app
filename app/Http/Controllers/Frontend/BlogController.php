<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function details($slug)
    {

        $blog = Blog::where('slug',$slug)->where('status',1)->with('category','user')->first();

        $blog->update([
            'view_count'=>$blog->view_count + 1,
        ]);

        return view('frontend.blog.details',[
            'blog'=>$blog,
            'likes'=>Like::where('blog_id',$blog->id),
            'categories'=>Category::where('status',1)->inRandomOrder()->limit(10)->get(),
            'popular_blog'=>Blog::with('user')->where('status',1)->orderBy('view_count','DESC')->limit(3)->get(),
            'comments'=>Comment::orderBy('created_at','DESC')->paginate(6),

        ]);
    }
}
