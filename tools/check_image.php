<?php
$path = $argv[1] ?? 'storage/app/public/gallery/gallery1.jpg';
$im = @imagecreatefrompng($path);
if (!$im) { echo "Not a PNG or failed to load: $path\n"; exit(1); }
$w = imagesx($im);
$h = imagesy($im);
$transparentCount = 0;
$total = 0;
for ($x = 0; $x < $w; $x += max(1, (int)($w / 50))) {
    for ($y = 0; $y < $h; $y += max(1, (int)($h / 50))) {
        $rgba = imagecolorat($im, $x, $y);
        $a = ($rgba >> 24) & 0x7F;
        if ($a == 127) $transparentCount++;
        $total++;
    }
}
echo "path=$path w=$w h=$h samples=$total transparent=$transparentCount\n";
imagedestroy($im);
