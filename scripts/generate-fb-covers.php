<?php
// Generate Facebook cover images (851x315) for KA Software business page
$out = '' . dirname(__DIR__) . '/marketing/fb-covers';
@mkdir($out, 0777, true);
$W = 851; $H = 315;
$fontB = 'C:/Windows/Fonts/arialbd.ttf';
$fontR = 'C:/Windows/Fonts/arial.ttf';

function gradBg($img, $W, $H, $stops) {
    for ($x = 0; $x < $W; $x++) {
        $t = $x / ($W - 1);
        for ($i = 0; $i < count($stops) - 1; $i++) {
            [$t0, $c0] = $stops[$i]; [$t1, $c1] = $stops[$i + 1];
            if ($t >= $t0 && $t <= $t1) {
                $f = ($t - $t0) / max($t1 - $t0, 0.0001);
                $r = (int)($c0[0] + ($c1[0] - $c0[0]) * $f);
                $g = (int)($c0[1] + ($c1[1] - $c0[1]) * $f);
                $b = (int)($c0[2] + ($c1[2] - $c0[2]) * $f);
                imageline($img, $x, 0, $x, $H, imagecolorallocate($img, $r, $g, $b));
                break;
            }
        }
    }
}

function softCircle($img, $cx, $cy, $rad, $r, $g, $b, $alpha) {
    $c = imagecolorallocatealpha($img, $r, $g, $b, $alpha);
    imagefilledellipse($img, $cx, $cy, $rad * 2, $rad * 2, $c);
}

function centeredText($img, $size, $x, $y, $color, $font, $text) {
    $bb = imagettfbbox($size, 0, $font, $text);
    $w = $bb[2] - $bb[0];
    imagettftext($img, $size, 0, (int)($x - $w / 2), $y, $color, $font, $text);
    return $w;
}

function chipRow($img, $font, $items, $cx, $y, $size, $padX, $padY, $gap, $bgCol, $txtCol) {
    // measure
    $widths = [];
    $total = 0;
    foreach ($items as $it) {
        $bb = imagettfbbox($size, 0, $font, $it);
        $w = $bb[2] - $bb[0] + $padX * 2;
        $widths[] = $w;
        $total += $w;
    }
    $total += $gap * (count($items) - 1);
    $x = (int)($cx - $total / 2);
    $hgt = $size + $padY * 2 + 4;
    foreach ($items as $i => $it) {
        $w = $widths[$i];
        // rounded rect approx
        imagefilledrectangle($img, $x + 8, $y, $x + $w - 8, $y + $hgt, $bgCol);
        imagefilledrectangle($img, $x, $y + 8, $x + $w, $y + $hgt - 8, $bgCol);
        imagefilledellipse($img, $x + 8, $y + 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + $w - 8, $y + 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + 8, $y + $hgt - 8, 16, 16, $bgCol);
        imagefilledellipse($img, $x + $w - 8, $y + $hgt - 8, 16, 16, $bgCol);
        $bb = imagettfbbox($size, 0, $font, $it);
        imagettftext($img, $size, 0, (int)($x + $padX), (int)($y + $padY + $size + 1), $txtCol, $font, $it);
        $x += $w + $gap;
    }
}

// ============ Variant 1: Brand gradient ============
$img = imagecreatetruecolor($W, $H);
gradBg($img, $W, $H, [
    [0.0, [37, 99, 235]],
    [0.55, [124, 58, 237]],
    [1.0, [219, 39, 119]],
]);
// decorative blobs
softCircle($img, 90, 40, 130, 255, 255, 255, 112);
softCircle($img, 800, 290, 150, 255, 255, 255, 112);
softCircle($img, 760, 30, 60, 255, 255, 255, 105);

$white = imagecolorallocate($img, 255, 255, 255);
$white80 = imagecolorallocatealpha($img, 255, 255, 255, 25);
$chipBg = imagecolorallocate($img, 255, 255, 255);

centeredText($img, 40, $W / 2, 118, $white, $fontB, 'KA Software');
centeredText($img, 16, $W / 2, 152, $white80, $fontR, 'AI-Powered Software Development Company');
chipRow($img, $fontB, ["Mobile Apps", "Web Apps", "AI / ML", "E-commerce", "HRMS", "CRM"], $W / 2, 180, 12, 14, 8, 10, $chipBg, imagecolorallocate($img, 109, 40, 217));
centeredText($img, 14, $W / 2, 262, $white, $fontB, 'www.kasoftware.in   |   +91 80566 53499   |   Chennai, India');
imagepng($img, "$out/cover-1-brand.png");
imagedestroy($img);
echo "cover-1-brand.png\n";

// ============ Variant 2: Photo based ============
$photo = imagecreatefromjpeg('' . dirname(__DIR__) . '/public/images/tech/earth-network.jpg');
$pw = imagesx($photo); $ph = imagesy($photo);
$img = imagecreatetruecolor($W, $H);
// cover-crop photo
$scale = max($W / $pw, $H / $ph);
$cw = (int)($W / $scale); $ch = (int)($H / $scale);
imagecopyresampled($img, $photo, 0, 0, (int)(($pw - $cw) / 2), (int)(($ph - $ch) / 2), $W, $H, $cw, $ch);
imagedestroy($photo);
// dark overlay, stronger at bottom
for ($y = 0; $y < $H; $y++) {
    $alpha = (int)(70 - ($y / $H) * 45); // 70 (transparent-ish) -> 25 (darker)
    imageline($img, 0, $y, $W, $y, imagecolorallocatealpha($img, 8, 12, 28, max($alpha, 25)));
}
$white = imagecolorallocate($img, 255, 255, 255);
$soft = imagecolorallocatealpha($img, 235, 240, 255, 20);
$accent = imagecolorallocate($img, 147, 197, 253);
centeredText($img, 15, $W / 2, 92, $accent, $fontB, 'BUILD THE FUTURE WITH INTELLIGENT SOFTWARE');
centeredText($img, 38, $W / 2, 148, $white, $fontB, 'KA Software');
centeredText($img, 15, $W / 2, 182, $soft, $fontR, '500+ Projects   ·   12 AI Products   ·   98% Client Satisfaction');
centeredText($img, 14, $W / 2, 248, $white, $fontB, 'www.kasoftware.in   |   +91 80566 53499');
imagepng($img, "$out/cover-2-photo.png");
imagedestroy($img);
echo "cover-2-photo.png\n";

// ============ Variant 3: Products (dark navy) ============
$img = imagecreatetruecolor($W, $H);
gradBg($img, $W, $H, [
    [0.0, [11, 18, 32]],
    [1.0, [22, 35, 63]],
]);
softCircle($img, 90, 280, 120, 37, 99, 235, 95);
softCircle($img, 790, 50, 110, 124, 58, 237, 95);
$white = imagecolorallocate($img, 255, 255, 255);
$mut = imagecolorallocatealpha($img, 159, 176, 206, 15);
$chipBg = imagecolorallocate($img, 40, 68, 130);
$chipTx = imagecolorallocate($img, 190, 215, 254);

centeredText($img, 30, $W / 2, 92, $white, $fontB, '12 Products. One Obsessed Team.');
centeredText($img, 14, $W / 2, 122, $mut, $fontR, 'Software products built and supported in Chennai, India');
chipRow($img, $fontB, ['VAHA AI', 'KA CRM', 'ShopNest', 'KartPOS', 'PeopleCore', 'InsightIQ'], $W / 2, 150, 12, 13, 8, 9, $chipBg, $chipTx);
chipRow($img, $fontB, ['ConvoDesk', 'VisionKit', 'DocuMind', 'Voxa AI', 'PipeForge', 'AgentForge'], $W / 2, 192, 12, 13, 8, 9, $chipBg, $chipTx);
centeredText($img, 14, $W / 2, 268, $white, $fontB, 'Explore them all  ->  www.kasoftware.in/products');
imagepng($img, "$out/cover-3-products.png");
imagedestroy($img);
echo "cover-3-products.png\n";

echo "done\n";
