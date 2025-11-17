<?php
// Test script untuk upload gambar
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\GalleryImage;

// Create a test gallery
$gallery = Gallery::create([
    'title' => 'Test Gallery Upload',
    'description' => 'Testing upload functionality',
    'event_date' => now()->toDateString(),
]);

echo "Gallery created: ID " . $gallery->id . "\n";

// Test 1: Try to copy existing file to test if destination is writable
try {
    $testSource = storage_path('app/public/gallery/gallery1.jpg');
    $testDest = storage_path('app/public/gallery/test_direct_copy.jpg');
    
    if (is_file($testSource)) {
        copy($testSource, $testDest);
        echo "Direct file copy successful\n";
        if (is_file($testDest)) {
            echo "Test destination file exists: " . filesize($testDest) . " bytes\n";
        }
    }
} catch (\Exception $e) {
    echo "Direct copy failed: " . $e->getMessage() . "\n";
}

// Test 2: Try to store using Laravel Storage facade
try {
    $file = new \Illuminate\Http\UploadedFile(
        storage_path('app/public/gallery/gallery1.jpg'),
        'test_uploaded.jpg',
        'image/jpeg',
        null,
        true
    );
    
    echo "Created UploadedFile object\n";
    
    $path = $file->storeAs('gallery', 'laravel_store_test.jpg', 'public');
    
    echo "Storage::storeAs returned: " . ($path ? $path : 'FALSE') . "\n";
    
    if ($path) {
        $fullPath = storage_path('app/public/' . $path);
        echo "Full path: " . $fullPath . "\n";
        if (is_file($fullPath)) {
            echo "File exists after storeAs: " . filesize($fullPath) . " bytes\n";
        } else {
            echo "File does NOT exist after storeAs\n";
        }
    }
} catch (\Exception $e) {
    echo "Laravel storeAs failed: " . $e->getMessage() . "\n";
}

// Test 3: Check disk configuration
echo "\nDisk configuration:\n";
$diskPath = config('filesystems.disks.public.root');
echo "Public disk root: " . $diskPath . "\n";
echo "Public disk URL: " . config('filesystems.disks.public.url') . "\n";
echo "Is writable: " . (is_writable($diskPath) ? 'YES' : 'NO') . "\n";

echo "\nDone\n";
