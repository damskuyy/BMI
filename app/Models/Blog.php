<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title','slug','content','image','status','author_id'
    ];

    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }
}