<?php
require __DIR__ . '/vendor/autoload.php';

use App\Models\Blog;
use Illuminate\Database\Capsule\Manager as DB;

// Bootstrap Laravel application
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$argv = $_SERVER['argv'];
if (isset($argv[1]) && is_numeric($argv[1])) {
    $id = intval($argv[1]);
    $blog = Blog::find($id);
    if (!$blog) {
        echo "Blog with id {$id} not found\n";
        exit(0);
    }
    echo "Found: {$blog->id} - {$blog->title}\n";
    if ($blog->image) {
        echo "Image: {$blog->image}\n";
    }
    try {
        $deleted = $blog->delete();
        echo $deleted ? "Deleted blog id {$id}\n" : "Failed to delete blog id {$id}\n";
    } catch (Exception $e) {
        echo "Exception when deleting: " . $e->getMessage() . "\n";
    }
} else {
    echo "Listing latest 10 blogs:\n";
    $blogs = Blog::orderBy('id','desc')->take(10)->get();
    foreach ($blogs as $b) {
        echo $b->id . ' - ' . str_replace("\n"," ", trim($b->title)) . "\n";
    }
}
