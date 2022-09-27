<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded =['id'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function publishedBlogByCateghory()
    {
        return $this->hasMany(Blog::class)->where('status',1);
    }
}
