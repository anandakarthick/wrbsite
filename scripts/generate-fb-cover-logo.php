<?php
// FB covers featuring the real KA logo (warm orange/red/yellow theme), phone 9789616885
$out = 'D:/cladue/wrbsite/marketing/fb-covers';
@mkdir($out, 0777, true);
$W = 851; $H = 315;
$fontB = 'C:/Windows/Fonts/arialbd.ttf';
$fontR = 'C:/Windows/Fonts/arial.ttf';
$logoFile = 'D:/kasoftware_logo.png';
if (!file_exists($logoFile)) { $logoFile = 'D:/cladue/wrbsite/public/images/logo.png'; }
$logo = imagecreatefrompng($logoFile);
imagesavealpha($logo, true);
$lw = imagesx($logo); $lh = imagesy($logo);

// find content bbox of logo (trim transparent margins)
$minX = $lw; $minY = $lh; $maxX = 0; $maxY = 0;
for ($y = 0; $y < $lh; $y += 2) {
    for ($x = 0; $x < $lw; $x += 2) {
        if (((imagecolorat($logo, $x, $y) >> 24) & 0x7F) < 100) {
            if ($x < $minX) $minX = $x; if ($x > $maxX) $maxX = $x;
            if ($y < $minY) $minY = $y; if ($y > $maxY) $maxY = $y;
        }
    }
}
$cw = $maxX - $minX + 1; $ch = $maxY - $minY + 1;

function softCircle($img, $cx, $cy, $rad, $r, $g, $b, $alpha) {
    imagefilledellipse($img, $cx, $cy, $rad * 2, $rad * 2, imagecolorallocatealpha($img, $r, $g, $b, $alpha));
}
function textAt($img, $size, $x, $y, $color, $font, $text) {
    imagettftext($img, $size, 0, (int)$x, (int)$y, $color, $font, $text);
    $bb = imagettfbbox($size, 0, $font, $text);
    return $bb[2] - $bb[0];
}
function chipRowLeft($img, $font, $items, $x, $y, $size, $padX, $padY, $gap, $bgCol, $txtCol) {
    $hgt = $size + $padY * 2 + 4;
    foreach ($items as $it) {
        $bb = imagettfbbox($size, 0, $font, $it);
        $w = $bb[2] - $bb[0] + $padX * 2;
        imagefilledrectangle($img, $x + 8, $y, $x + $w - 8, $y + $hgt, $bgCol);
        imagefilledrectangle($img, $x, $y + 8, $x + $w, $y + $hgt - 8, $bgCol);
        imagefilledellipse($img, $x + 8, $y + 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + $w - 8, $y + 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + 8, $y + $hgt - 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + $w - 8, $y + $hgt - 8, 16, 16, $bgCol);
        imagettftext($img, $size, 0, (int)($x + $padX), (int)($y + $padY + $size + 1), $txtCol, $font, $it);
        $x += $w + $gap;
    }
}
function placeLogo($img, $logo, $minX, $minY, $cw, $ch, $destX, $destY, $destH) {
    $scale = $destH / $ch;
    $dw = (int)($cw * $scale);
    imagecopyresampled($img, $logo, (int)$destX, (int)$destY, $minX, $minY, $dw, $destH, $cw, $ch);
    return $dw;
}

// ---------- Variant A: light warm ----------
$img = imagecreatetruecolor($W, $H);
imagefilledrectangle($img, 0, 0, $W, $H, imagecolorallocate($img, 255, 251, 245));
// warm soft blobs
softCircle($img, 830, 30, 150, 251, 146, 60, 105);   // orange
softCircle($img, 40, 300, 130, 251, 191, 36, 108);   // yellow
softCircle($img, 700, 300, 90, 239, 68, 68, 112);    // red
// bottom warm bar
for ($x = 0; $x < $W; $x++) {
    $t = $x / $W;
    $r = (int)(251 - 12 * $t); $g = (int)(146 - 80 * $t); $b = (int)(60 - 24 * $t);
    imageline($img, $x, $H - 8, $x, $H, imagecolorallocate($img, $r, $g, $b));
}
$ink = imagecolorallocate($img, 30, 20, 12);
$muted = imagecolorallocate($img, 120, 95, 75);
$orange = imagecolorallocate($img, 234, 88, 12);
$chipBg = imagecolorallocate($img, 255, 237, 213);
$chipTx = imagecolorallocate($img, 194, 65, 12);

// logo left
$dw = placeLogo($img, $logo, $minX, $minY, $cw, $ch, 92, 42, 230);
// text block right of logo
$tx = 92 + $dw + 48;
textAt($img, 38, $tx, 120, $ink, $fontB, 'KA Software');
textAt($img, 15, $tx, 152, $muted, $fontR, 'We build AI that works for your business - Chennai, India');
chipRowLeft($img, $fontB, ['AI Chatbots', 'Computer Vision', 'Voice AI', 'Document AI'], $tx, 172, 12, 13, 8, 9, $chipBg, $chipTx);
chipRowLeft($img, $fontB, ['Predictive Analytics', 'AI Mobile & Web Apps', '12 AI Products'], $tx, 212, 12, 13, 8, 9, $chipBg, $chipTx);
textAt($img, 15, $tx, 275, $orange, $fontB, 'www.kasoftware.in   |   +91 97896 16885');
imagepng($img, "$out/cover-4-logo-light.png");
imagedestroy($img);
echo "cover-4-logo-light.png\n";

// ---------- Variant B: dark warm ----------
$img = imagecreatetruecolor($W, $H);
for ($x = 0; $x < $W; $x++) {
    $t = $x / $W;
    $r = (int)(24 + 14 * $t); $g = (int)(16 + 8 * $t); $b = (int)(28 + 8 * $t);
    imageline($img, $x, 0, $x, $H, imagecolorallocate($img, $r, $g, $b));
}
softCircle($img, 810, 40, 140, 249, 115, 22, 100);
softCircle($img, 60, 290, 120, 251, 191, 36, 105);
$white = imagecolorallocate($img, 255, 250, 244);
$soft = imagecolorallocatealpha($img, 255, 224, 194, 25);
$gold = imagecolorallocate($img, 251, 191, 36);
$chipBg = imagecolorallocate($img, 62, 38, 24);
$chipTx = imagecolorallocate($img, 253, 186, 116);

$dw = placeLogo($img, $logo, $minX, $minY, $cw, $ch, 92, 42, 230);
$tx = 92 + $dw + 48;
textAt($img, 38, $tx, 120, $white, $fontB, 'KA Software');
textAt($img, 15, $tx, 152, $soft, $fontR, 'We build AI that works for your business - Chennai, India');
chipRowLeft($img, $fontB, ['AI Chatbots', 'Computer Vision', 'Voice AI', 'Document AI'], $tx, 172, 12, 13, 8, 9, $chipBg, $chipTx);
chipRowLeft($img, $fontB, ['Predictive Analytics', 'AI Mobile & Web Apps', '12 AI Products'], $tx, 212, 12, 13, 8, 9, $chipBg, $chipTx);
textAt($img, 15, $tx, 275, $gold, $fontB, 'www.kasoftware.in   |   +91 97896 16885');
imagepng($img, "$out/cover-5-logo-dark.png");
imagedestroy($img);
echo "cover-5-logo-dark.png\n";

imagedestroy($logo);
echo "done\n";
