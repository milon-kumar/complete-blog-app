<?php

namespace App\Models;

use App\Helper\Uploads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Works extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    protected $casts = [
        'created_at'  => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public static function saveOrUpdate($request,$id=null)
    {
        $blog = Service::updateOrCreate(['id'=>$id],[
            'user_id'       =>Auth::id(),
            'title'         =>$request->input('title'),
            'slug'          =>Str::slug($request->input('title')),
            'description'   =>$request->input('description'),
            'status'        =>$request->input('status'),
            'image'         =>Uploads::ImageUpload($request->file('image'),isset($id) ? Blog::find($id)->image: null,'blog'),
        ]);
    }
}
