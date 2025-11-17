<?php

namespace App\Console\Commands;

use App\Models\Gallery;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TestGalleryUpload extends Command
{
    protected $signature = 'test:gallery-upload';
    protected $description = 'Test gallery upload by simulating controller store method';

    public function handle()
    {
        $this->info('Testing gallery upload process...');

        // Create test file
        $testImagePath = storage_path('app/public/gallery/gallery1.jpg');
        if (!file_exists($testImagePath)) {
            $this->error('Test source file does not exist');
            return;
        }

        // Simulate creating UploadedFile
        $uploadedFile = new UploadedFile(
            $testImagePath,
            'test_upload.jpg',
            'image/jpeg',
            null,
            true
        );

        // Simulate the controller store method
        try {
            $this->info('Creating gallery...');
            $gallery = Gallery::create([
                'title' => 'Test Gallery ' . now()->timestamp,
                'description' => 'Testing upload via artisan command',
                'event_date' => now()->toDateString(),
            ]);
            $this->info('Gallery created with ID: ' . $gallery->id);

            // Simulate storing image
            $this->info('Storing image...');
            $imageName = uniqid() . '_0.jpg';
            $this->info('Image name: ' . $imageName);

            $path = $uploadedFile->storeAs('gallery', $imageName, 'public');

            $this->info('storeAs returned: ' . ($path ?: 'FALSE'));

            if ($path === false) {
                $this->error('storeAs failed!');
                return;
            }

            $this->info('File stored at path: ' . $path);

            // Verify file exists
            $fullPath = storage_path('app/public/' . $path);
            if (is_file($fullPath)) {
                $this->info('File verified at: ' . $fullPath . ' (' . filesize($fullPath) . ' bytes)');
            } else {
                $this->error('File not found at expected location: ' . $fullPath);
                return;
            }

            // Create database record
            $this->info('Creating gallery image record...');
            $galleryImage = \App\Models\GalleryImage::create([
                'gallery_id' => $gallery->id,
                'image' => $path,
                'display_mode' => 'col-4',
                'center_image' => false,
            ]);
            $this->info('GalleryImage created with ID: ' . $galleryImage->id);

            // Verify database record
            $this->info('Verifying database record...');
            $verified = \App\Models\GalleryImage::find($galleryImage->id);
            if ($verified) {
                $this->info('Database record verified:');
                $this->info('  - ID: ' . $verified->id);
                $this->info('  - Gallery ID: ' . $verified->gallery_id);
                $this->info('  - Image path: ' . $verified->image);
            }

            // Test display
            $this->info('Testing display URLs...');
            $assetUrl = asset('storage/' . $path);
            $this->info('Asset URL would be: ' . $assetUrl);

            $this->info('');
            $this->info('SUCCESS! Gallery and image uploaded successfully');

        } catch (\Exception $e) {
            $this->error('Exception: ' . $e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }
}
