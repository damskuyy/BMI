<?php


namespace App\Models;

use App\Models\GalleryImage;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title','description','event_date','image'
    ];

    protected $dates = ['event_date'];
    
    // New relation: one gallery has many images
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}