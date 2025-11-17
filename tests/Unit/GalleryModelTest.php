<?php

namespace Tests\Unit;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_can_be_deleted()
    {
        $gallery = Gallery::create([
            'title' => 'Test Gallery',
            'description' => 'Test',
            'event_date' => '2025-11-14',
        ]);

        $id = $gallery->id;

        $this->assertDatabaseHas('galleries', ['id' => $id]);

        // Now try to delete
        $gallery->delete();

        $this->assertDatabaseMissing('galleries', ['id' => $id]);
    }

    public function test_gallery_images_cascade_delete()
    {
        $gallery = Gallery::create([
            'title' => 'Test Gallery',
            'description' => 'Test',
            'event_date' => '2025-11-14',
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery->id,
            'image' => 'gallery/test.jpg',
            'display_mode' => 'col-4',
        ]);

        $galleryId = $gallery->id;
        $imageCount = GalleryImage::where('gallery_id', $galleryId)->count();
        $this->assertEquals(1, $imageCount);

        // Delete gallery
        $gallery->delete();

        // Check if images are cascade deleted
        $remainingImages = GalleryImage::where('gallery_id', $galleryId)->count();
        $this->assertEquals(0, $remainingImages);

        // Check if gallery is deleted
        $this->assertDatabaseMissing('galleries', ['id' => $galleryId]);
    }
}
