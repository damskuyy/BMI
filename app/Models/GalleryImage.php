<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_id', 'image', 'display_mode', 'center_image'
    ];

    protected $casts = [
        'center_image' => 'boolean',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
