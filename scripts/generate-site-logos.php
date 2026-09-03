<?php
// Distinct logos: nambaparisal (emerald circle + leaf) and svproducts (rose diamond)
$base = '' . dirname(__DIR__) . '/public/sites';
$fontB = 'C:/Windows/Fonts/arialbd.ttf';
$S = 240;

function newCanvas($S) {
    $img = imagecreatetruecolor($S, $S);
    imagesavealpha($img, true);
    imagealphablending($img, false);
    imagefilledrectangle($img, 0, 0, $S, $S, imagecolorallocatealpha($img, 0, 0, 0, 127));
    imagealphablending($img, true);
    return $img;
}
function lerp($a, $b, $t) { return (int)($a + ($b - $a) * $t); }

// ---------- nambaparisal: emerald circle badge with leaf ----------
$img = newCanvas($S);
$cx = 120; $cy = 120; $R = 106;
for ($y = 0; $y < $S; $y++) {
    for ($x = 0; $x < $S; $x++) {
        $d = sqrt(($x - $cx) ** 2 + ($y - $cy) ** 2);
        if ($d <= $R) {
            $t = ($y - ($cy - $R)) / (2 * $R); // vertical gradient
            $c = imagecolorallocate($img, lerp(5, 13, $t), lerp(150, 148, $t), lerp(105, 136, $t));
            imagesetpixel($img, $x, $y, $c);
        }
    }
}
// inner white ring
$white = imagecolorallocate($img, 255, 255, 255);
imagesetthickness($img, 5);
imagearc($img, $cx, $cy, ($R - 12) * 2, ($R - 12) * 2, 0, 360, imagecolorallocatealpha($img, 255, 255, 255, 70));
imagesetthickness($img, 1);
// letters np
$bb = imagettfbbox(72, 0, $fontB, 'np');
$tw = $bb[2] - $bb[0]; $th = $bb[1] - $bb[7];
imagettftext($img, 72, 0, (int)($cx - $tw / 2 - $bb[0]), (int)($cy + $th / 2 - 6), $white, $fontB, 'np');
// lime leaf: two overlapping ellipses top-right
$lime = imagecolorallocate($img, 132, 204, 22);
imagefilledellipse($img, 185, 48, 42, 24, $lime);
imagefilledellipse($img, 196, 40, 24, 34, $lime);
// leaf stem
imagesetthickness($img, 4);
imageline($img, 172, 58, 200, 34, imagecolorallocate($img, 77, 124, 15));
imagesetthickness($img, 1);
imagepng($img, "$base/nambaparisal/logo.png");
imagedestroy($img);
echo "nambaparisal logo.png\n";

// ---------- svproducts: rose diamond, sharp style ----------
$img = newCanvas($S);
$half = 112;
for ($y = 0; $y < $S; $y++) {
    for ($x = 0; $x < $S; $x++) {
        $m = abs($x - 120) + abs($y - 120);
        if ($m <= $half) {
            $t = ($x + $y) / (2 * ($S - 1)); // diagonal gradient
            $c = imagecolorallocate($img, lerp(190, 251, $t), lerp(18, 146, $t), lerp(60, 60, $t));
            imagesetpixel($img, $x, $y, $c);
        }
    }
}
// inner diamond outline
$edge = imagecolorallocatealpha($img, 255, 255, 255, 70);
imagesetthickness($img, 4);
$in = $half - 14;
imagepolygon($img, [120, 120 - $in, 120 + $in, 120, 120, 120 + $in, 120 - $in, 120], $edge);
imagesetthickness($img, 1);
// letters SV
$white = imagecolorallocate($img, 255, 255, 255);
$bb = imagettfbbox(58, 0, $fontB, 'SV');
$tw = $bb[2] - $bb[0]; $th = $bb[1] - $bb[7];
imagettftext($img, 58, 0, (int)(120 - $tw / 2 - $bb[0]), (int)(120 + $th / 2 - 4), $white, $fontB, 'SV');
imagepng($img, "$base/svproducts/logo.png");
imagedestroy($img);
echo "svproducts logo.png\n";
