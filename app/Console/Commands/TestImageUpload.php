<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TestImageUpload extends Command
{
    protected $signature = 'test:image-upload';
    protected $description = 'Test image upload functionality';

    public function handle()
    {
        $this->info('Testing image upload...');

        // Test 1: Direct write
        $this->info('Test 1: Direct file write');
        $result = file_put_contents(storage_path('app/public/gallery/direct_write_test.txt'), 'test');
        $this->info('Direct write: ' . ($result ? 'SUCCESS' : 'FAILED'));

        // Test 2: Laravel Storage::put
        $this->info('Test 2: Storage::put');
        Storage::disk('public')->put('gallery/storage_put_test.txt', 'test');
        $exists = Storage::disk('public')->exists('gallery/storage_put_test.txt');
        $this->info('Storage::put: ' . ($exists ? 'SUCCESS' : 'FAILED'));

        // Test 3: UploadedFile::storeAs
        $this->info('Test 3: UploadedFile::storeAs');
        try {
            $testFile = storage_path('app/public/gallery/gallery1.jpg');
            if (!file_exists($testFile)) {
                $this->error('Source file does not exist: ' . $testFile);
                return;
            }

            $uploadedFile = new UploadedFile(
                $testFile,
                'gallery1.jpg',
                'image/jpeg',
                null,
                true // test mode
            );

            $this->info('UploadedFile created from: ' . $testFile);
            $this->info('File size: ' . $uploadedFile->getSize());

            $path = $uploadedFile->storeAs('gallery', 'storeAs_test_image.jpg', 'public');

            $this->info('storeAs returned: ' . ($path ?: 'FALSE'));

            if ($path) {
                $fullPath = storage_path('app/public/' . $path);
                $fileExists = is_file($fullPath);
                $this->info('File exists at ' . $fullPath . ': ' . ($fileExists ? 'YES' : 'NO'));
                if ($fileExists) {
                    $this->info('File size: ' . filesize($fullPath));
                }
            }
        } catch (\Exception $e) {
            $this->error('Exception: ' . $e->getMessage());
        }

        // Test 4: Check disk path
        $this->info('Test 4: Check disk path');
        $diskPath = config('filesystems.disks.public.root');
        $this->info('Public disk root: ' . $diskPath);
        $this->info('Is directory: ' . (is_dir($diskPath) ? 'YES' : 'NO'));
        $this->info('Is writable: ' . (is_writable($diskPath) ? 'YES' : 'NO'));
    }
}
