<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Blog extends Model
{
    protected $fillable = [
        'title','slug','content','image','status','author_id',
        'category','quote','poster_name','posted_at',
        'description_1','description_2','description_3','description_4','description_5'
    ];

    protected $casts = [
        'posted_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }
}