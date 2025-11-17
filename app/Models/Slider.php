<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'image', 'link', 'section'];

    public static $sections = [
        'home' => 'Home',
        'about' => 'About',
        'member' => 'Member',
        'product' => 'Product',
        'gallery' => 'Gallery',
        'blog' => 'Blog',
        'blog_details' => 'Blog Details',
        'contact' => 'Contact',
        'manufaktur' => 'About Manufaktur',
        'kuliner' => 'About Kuliner (UMKM)',
        'kerajinan' => 'About Kerajinan',
    ];
}