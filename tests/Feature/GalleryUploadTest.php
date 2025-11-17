<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Gallery;

class GalleryUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_upload_with_image()
    {
        // Create and act as authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);

        $imageFile = UploadedFile::fake()->image('test_image.jpg', 100, 100);

        $response = $this->post('/gallery_be', [
            'title' => 'Test Gallery',
            'description' => 'Test Description',
            'event_date' => '2025-11-14',
            'images' => [$imageFile],
            'display_mode' => ['col-4'],
            'center_image' => [],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/gallery_be');

        $this->assertDatabaseHas('galleries', [
            'title' => 'Test Gallery',
        ]);

        $gallery = Gallery::where('title', 'Test Gallery')->first();
        $this->assertNotNull($gallery);
        $this->assertCount(1, $gallery->images()->get());
    }
}
