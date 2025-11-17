<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
        'ordering_method',
        'shopee_link',
        'tokopedia_link',
        'phone',
        'use_default_phone',
        'slug'
    ];
}
