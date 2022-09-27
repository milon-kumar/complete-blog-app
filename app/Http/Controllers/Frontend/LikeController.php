<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function store_like(Request $request)
    {

        if (Auth::check()){
            $blog = Blog::find($request->blog_id);
            if ($blog->is_like == true){

                $blog->update([
                    'is_like'=>false,
                ]);

                Like::create([
                    'user_id'=>Auth::id(),
                    'blog_id'=>$blog->id,
                ]);

                toast('Un Like Success','success');
            }else{
                $blog->update([
                    'is_like'=>true,
                ]);
                toast('Like Success','success');
            }
        }else{
            toast('Please First Login');
            return redirect()->back();
        }


        return redirect()->back();
    }
}
