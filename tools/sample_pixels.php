<?php
$path = $argv[1] ?? 'storage/app/public/gallery/gallery1.jpg';
$im = @imagecreatefromstring(file_get_contents($path));
if (!$im) { echo "Failed to load $path\n"; exit(1); }
$w = imagesx($im); $h = imagesy($im);
$y = (int)($h/2);
$out = [];
for ($x=0;$x<$w;$x+=50){ $rgba = imagecolorat($im,$x,$y); $r = ($rgba>>16)&0xFF; $g = ($rgba>>8)&0xFF; $b = $rgba&0xFF; $a = ($rgba>>24)&0x7F; $out[] = "$x:($r,$g,$b,$a)"; }
echo implode(' | ',$out)."\n";
imagedestroy($im);
