<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = self::validate($request,[
           'name'   =>'required',
           'email'  =>'required|email',
           'comment'=>'required|max:5000',
        ]);

        $data['user_id']= Auth::id();

        if (isset(Auth::user()->image)){
            $data['image'] = Auth::user()->image;
        }else{
            $data['image']='default.jpg';
        }

        Comment::create($data);

        toast('Comment Successfully','success');
        return redirect()->back();
    }
}
