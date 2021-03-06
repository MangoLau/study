<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/15
 * Time: 15:41
 */

$size_x = 640;
$size_y = 480;
$title = 'People m ing to the snow every winter';
$title2 = 'Head count (in 1.000)';
$values = [
    1999 => 5300,
    2000 => 5700,
    2001 => 6400,
    2002 => 6700,
    2003 => 6600,
    2004 => 7100,
];
$max_value = 8000;
$units = 500;
$img = imagecreatetruecolor($size_x, $size_y);
imageantialias($img, true);
imagealphablending($img, true);

$bg_image = './chart-bg.png';
$bg = imagecreatefrompng($bg_image);
$sizes = getimagesize($bg_image);
imagecopyresampled(
    $img,
    $bg,
    0,
    0,
    0,
    0,
    $size_x,
    $size_y,
    $sizes[0],
    $sizes[1]
);
// 图区域
$background = imagecolorallocatealpha($img, 127,127, 192, 32);
imagefilledrectangle(
    $img,
    20,
    20,
    $size_x - 20,
    $size_y - 80,
    $background
);
imagefilledrectangle(
    $img,
    20,
    $size_y - 60,
    $size_x - 20,
    $size_y - 20,
    $background
);

// 值
$barcolor = imagecolorallocatealpha($img, 0, 0, 128, 80);
$spacing = ($size_x - 140) / count($values);
$start_x = 120;
foreach ($values as $key => $value) {
    $x1 = $start_x + 0.2 * $spacing;
    $x2 = $start_x + 0.8 * $spacing;
    $y1 = $size_y - 120;
    $y2 = $y1 - (($value / $max_value) * ($size_y - 160));
    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $barcolor);
    $start_x += $spacing;
}

// 格子
$black = imagecolorallocate($img, 0, 0, 0);
$grey = imagecolorallocate($img, 128, 128, 192);
for ($i = $units; $i <= $max_value; $i += $units) {
    $x1 = 110;
    $y1 = $size_y - 120 - (($i / $max_value) * ($size_y - 160));
    $x2 = $size_x - 20;
    $y2 = $y1;
    imageline($img, $x1, $y1, $x2, $y2, ($i % (2 * $units)) == 0 ? $black : $grey);
}

// 轴
imageline($img, 120, $size_y - 120, 120, 40, $black);
imageline($img, 120, $size_y - 120, $size_x - 20, $size_y - 120, $black);

// 标题
$c_x = $size_x / 2;
$c_y = $size_y - 40;
$box = imagettfbbox(20, 0, 'arial.ttf', $title);
$sx = $box[4] - $box[0];
$sy = $box[5] + $box[1];
imagettftext(
    $img,
    20,
    0,
    $c_x - $sx / 2,
    $c_y - ($sy / 2),
    $black,
    'arial.ttf',
    $title
);

$c_x = 50;
$c_y = ($size_y - 60) / 2;
$box = imagettfbbox(14, 90, 'arial.ttf', $title2);
$sx = $box[4] - $box[0];
$sy = $box[5] + $box[1];
imagettftext(
    $img, 14,
    90,
    $c_x - ($sx / 2),
    $c_y - ($sy / 2),
    $black,
    'arial.ttf',
    $title2
);

// 标签
$c_y = $size_y - 100;
$start_x = 120;

foreach ($values as $label => $dummy) {
    $box = imagettfbbox(12, 0, 'arial.ttf', $label);
    $sx = $box[4] - $box[0];
    $sy = $box[5] + $box[1];
    $c_x = $start_x + (0.5 * $spacing);
    imagettftext(
        $img,
        12,
        0,
        $c_x - ($sx / 2),
        $c_y - ($sy / 2),
        $black,
        'arial.ttf',
        $label
    );
    $start_x += $spacing;
}

$r_x = 100;
for ($i = 0; $i <= $max_value; $i += ($units * 2)) {
    $c_y = $size_y - 120 - (($i /$max_value) * ($size_y - 160));
    $box = imagettfbbox(12, 0, 'arial.ttf', $i / 100);
    $sx = $box[4] - $box[0];
    $sy = $box[5] + $box[1];
    imagettftext(
        $img,
        12,
        0,
        $r_x - $sx,
        $c_y - ($sy / 2),
        $black,
        'arial.ttf',
        $i / 100
    );
}

// 输出到浏览器
header('Content-type: image/png');
imagepng($img);