<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public static function saveOrUpdate($request,$id=null)
    {
        Tag::updateOrCreate(['id'=>$id],[
            'user_id'       =>Auth::id(),
            'name'         =>$request->input('name'),
            'slug'          =>Str::slug($request->input('name')),
            'body'   =>$request->input('body'),
            'status'        =>$request->input('status'),
        ]);
    }

}
