<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryDeleteSimpleTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_gallery_simple()
    {
        // Create user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create gallery
        $gallery = Gallery::create([
            'title' => 'Test Gallery',
            'description' => 'Test',
            'event_date' => '2025-11-14',
        ]);

        $galleryId = $gallery->id;

        // Verify it exists
        $this->assertDatabaseHas('galleries', ['id' => $galleryId]);

        // Try delete
        echo "\nDeleting gallery ID: " . $galleryId;
        echo "\nBefore delete - Count: " . Gallery::count();

        $response = $this->delete('/gallery_be/' . $galleryId);

        echo "\nAfter delete response status: " . $response->status();
        echo "\nAfter delete - Count: " . Gallery::count();
        echo "\nGalleries remaining: ";
        dd(Gallery::pluck('id')->toArray());
    }
}
