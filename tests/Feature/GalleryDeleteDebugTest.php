<?php

namespace Tests\Feature;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GalleryDeleteDebugTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_gallery_debug()
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
        $this->assertEquals(1, Gallery::count());

        // Try delete with DELETE HTTP method
        $response = $this->delete('/gallery_be/' . $galleryId);

        // Check if redirect happened (302/301)
        $this->assertTrue(in_array($response->status(), [301, 302]));

        // Check if gallery is deleted
        $remainingCount = Gallery::count();
        $this->assertEquals(0, $remainingCount, 'Gallery was not deleted! Remaining: ' . $remainingCount);
    }
}
