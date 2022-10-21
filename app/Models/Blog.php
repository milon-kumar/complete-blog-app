<?php

namespace App\Models;

use App\Helper\Uploads;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $table ='blogs';
    protected $guarded =['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'blog_category','blog_id','category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Category::class,'blog_tag','blog_id','tag_id');
    }

    public function getImageAttribute($image)
    {
        return asset($image);
    }


    protected $casts = [
        'created_at'  => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'
    ];
    public static function saveOrUpdate($request,$id=null)
    {
        $blog = Blog::updateOrCreate(['id'=>$id],[
            'user_id'       =>Auth::id(),
            'title'         =>$request->input('title'),
            'slug'          =>Str::slug($request->input('title')),
            'description'   =>$request->input('description'),
            'status'        =>$request->input('status'),
            'image'         =>Uploads::ImageUpload($request->file('image'),isset($id) ? Blog::find($id)->image: null,'blog'),
        ]);

        $blog->categories()->attach($request->category_id);
        $blog->tags()->attach($request->tag_id);

        return $blog;
    }
}
