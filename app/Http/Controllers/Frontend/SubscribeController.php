<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        self::validate($request,[
            'email'=>'required|email|unique:subscribes,email',
        ]);


        Subscribe::create([
           'email'=>$request->input('email'),
        ]);

        toast('Subscribed','success');

        return redirect()->back();
    }
}
