<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Uploads;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('backend.blog.index',[
            'blogs'=>Blog::orderBy('id','DESC')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.blog.create',[
            'categories'=>Category::where('status',1)->get(),
            'tags'=>Tag::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {

        self::validate($request,[
            'title'         =>'required',
            'description'   =>'required',
            'image'         =>'required|image|mimes:jpg,jpeg,png,webp',
            'status'        =>'required|integer',
        ]);

         Blog::saveOrUpdate($request);

        toast('Blog Saved','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Blog $blog)
    {

        return view('backend.blog.edit',[
            'categories'=>Category::where('status',1)->get(),
            'tags'=>Tag::where('status',1)->get(),
            'blog'=>$blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog)
    {

        self::validate($request,[
            'title'         =>'required',
            'description'   =>'required',
            'image'         =>'nullable|image|mimes:jpg,jpeg,png,webp',
            'status'        =>'required|integer',
        ]);

        Blog::saveOrUpdate($request,$blog->id);

        toast('Blog Updated','success');
        return redirect()->route('backend.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        if (file_exists(public_path('uploads/').$blog->image)){
            unlink(public_path('uploads/'.$blog->image));
            $blog->delete();
            toast('Blog Deleted','success');
            return redirect()->route('backend.blog.index');
        }else{
            $blog->delete();
            toast('Blog Deleted','success');
            return redirect()->route('backend.blog.index');
        }
    }
}
