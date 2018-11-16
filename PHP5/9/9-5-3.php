<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/15
 * Time: 17:36
 */

$image = './IMG_20150529_153709.jpg';
$size = getimagesize($image);
$img = imagecreatefromjpeg($image);

$exif = exif_read_data($image);
//print_r($exif);die;

$str = [];
$items = ['ShutterSpeedValue', 'ApertureValue', 'FocalLength'];
foreach ($items as $item) {
    if (isset($exif[$item])) {
        $parts = explode('/', $exif[$item]);
        if ($item == 'ShutterSpeedValue') {
            $str[] = 'Shutter Speed: 1/'.(int)pow(2, $parts[0] / $parts[1]) . ' sec';
        } else if ($item == 'ApertureValue') {
            $str[] = 'Aperture: ' . round(exp(($parts[0] / $parts[1]) * 0.5 * log(2)), 1);
        } else if ($item == 'FocalLength') {
            $str[] = 'FocalLength: ' . round($parts[0] / $parts[1], 2) . 'mm';
        }
    }
}
if (isset($exif['OwnerName'])) {
    $str[] = '©' . $exif['OwnerName'];
}
imagestring(
    $img,
    5,
    3,
    $size[1] - 21,
    implode('; ', $str),
    imagecolorallocate($img, 0, 0, 0)
);
imagestring(
    $img,
    5,
    2,
    $size[1] - 20,
    implode('; ', $str),
    imagecolorallocate($img, 0, 255, 0)
);
header('Content-Type: image/jpeg');
imagepng($img);
