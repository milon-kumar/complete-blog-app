<?php

namespace App\Models;

use App\Helper\Uploads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $table="services";
    protected $guarded =['id'];

    protected $casts = [
        'created_at'  => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function saveOrUpdate($request,$id=null)
    {
        $blog = Service::updateOrCreate(['id'=>$id],[
            'user_id'       =>Auth::id(),
            'name'         =>$request->input('name'),
            'slug'          =>Str::slug($request->input('name')),
            'body'   =>$request->input('body'),
            'status'        =>$request->input('status'),
            'image'         =>Uploads::ImageUpload($request->file('image'),isset($id) ? Blog::find($id)->image: null,'blog'),
        ]);
    }

    public function getImageAttribute($image)
    {
        return asset($image);
    }
}
