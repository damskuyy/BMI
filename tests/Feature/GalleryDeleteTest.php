<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_gallery()
    {
        // Create user and act as authenticated
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create gallery with images
        $gallery = Gallery::create([
            'title' => 'Test Gallery to Delete',
            'description' => 'Test description',
            'event_date' => '2025-11-14',
        ]);

        GalleryImage::create([
            'gallery_id' => $gallery->id,
            'image' => 'gallery/test_image.jpg',
            'display_mode' => 'col-4',
            'center_image' => false,
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'title' => 'Test Gallery to Delete',
        ]);

        // Delete the gallery
        $response = $this->delete(route('gallery_be.destroy', $gallery));

        // Check redirect
        $response->assertStatus(302);
        $response->assertRedirect(route('gallery_be.index'));

        // Verify gallery is deleted
        $this->assertDatabaseMissing('galleries', [
            'id' => $gallery->id,
        ]);

        // Verify gallery images are deleted
        $this->assertDatabaseMissing('gallery_images', [
            'gallery_id' => $gallery->id,
        ]);
    }
}
