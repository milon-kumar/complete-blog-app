<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    private static $authId , $user;
    public function __construct()
    {
        self::$authId =  Auth::id();
        self::$user =  Auth::user();
    }

    public function dashboard()
    {
        return view('frontend.dashboard.dashboard',[
            'totalComment'=>Comment::where('user_id',self::$authId)->count(),
            'totalMessage'=>Contract::where('user_id',self::$authId)->count(),
            'resentlyPostedBlog'=>Blog::where('status',1)->orderBy('created_at','DESC')->limit(10)->get(),
        ]);
    }

    public function profile()
    {
        return view('frontend.profile.profile',[
            'user' => Auth::user(),
        ]);
    }

    public function comment()
    {
        return view('frontend.profile.comment',[
            'comments'=>Comment::where('user_id',Auth::id())->paginate(10),
        ]);
    }

    public function message()
    {
        return view('frontend.profile.message',[
           'messages'=>Contract::where('user_id',Auth::id())->paginate(10),
        ]);
    }

    public function setting()
    {
        return view('frontend.profile.settings');
    }

    public function changeEmail()
    {
        return view('frontend.profile.change_email');
    }

    public function updateEmail(Request $request)
    {
        self::validate($request,[
            'current_email' =>'required|email',
            'new_email'     =>'required|email',
        ]);

        $user = User::where('email' , $request->current_email)->first();

        if ($user){
            $user->update([
                'email'=>$request->input('new_email'),
            ]);
            toast('Email Changed','success');
            return redirect()->back();
        }else{
            toast('Invalide Current Email','error');
            return redirect()->back();
        }
    }

    public function changePassword(Request $request)
    {
        self::validate($request,[
            'current_password'  => 'required',
            'new_password'      => 'required|min:8',
            'confirm_password'  => 'required_with:new_password|same:new_password',
        ]);

        $password = Auth::user();

        if (Hash::check($request->current_password,$password->password)){
            $password->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
            toast('Password Changed','success');
            return redirect()->back();
        }else{
            toast("Password Doen't Match","error");
            return redirect()->back();
        }
    }

    public function profileDelete()
    {
        return view('frontend.profile.delete_account');
    }

    public function deleteAccount(Request $request)
    {
        self::validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user =  Auth::user();

        if ($user->email == $request->email){
            if (Hash::check($request->password,$user->password)){
                $user->delete();
                Auth::logout();
                toast('Account Deleted','success');
                return redirect()->back();
            }else{
                toast("Password Dosn't match",'error');
                return redirect()->back();
            }
        }else{
            toast('Invalide Your Eamil Address','error');
            return redirect()->route('frontend.profile-delete');
        }

        //return redirect()->back();
    }
}
