<?php
$dir = __DIR__ . '/../storage/app/public/gallery';
$files = glob($dir . '/*.jpg');
if (!$files) { echo "No files found in $dir\n"; exit(0); }
foreach ($files as $file) {
    $data = file_get_contents($file);
    if ($data === false) { echo "Failed to read $file\n"; continue; }
    // detect PNG header
    $header = substr($data, 0, 8);
    $isPng = (strlen($header) === 8 && ord($header[0])===137 && ord($header[1])===80 && ord($header[2])===78 && ord($header[3])===71);
    if (!$isPng) {
        echo basename($file) . " - already not PNG, skipping\n";
        continue;
    }
    echo basename($file) . " - PNG detected, converting...\n";
    $im = @imagecreatefromstring($data);
    if (!$im) { echo "  failed to load image: " . basename($file) . "\n"; continue; }
    $w = imagesx($im);
    $h = imagesy($im);
    $out = imagecreatetruecolor($w, $h);
    // fill with white
    $white = imagecolorallocate($out, 255,255,255);
    imagefill($out, 0, 0, $white);
    // preserve if PNG has alpha - copy onto white
    imagecopy($out, $im, 0,0,0,0,$w,$h);
    // overwrite with jpeg
    $ok = imagejpeg($out, $file, 90);
    imagedestroy($im);
    imagedestroy($out);
    if ($ok) echo "  converted to JPG: " . basename($file) . "\n";
    else echo "  failed to write JPG for: " . basename($file) . "\n";
}
