<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 17:00
 */

require_once 'Crypt_HMAC.php';

define('SECRET_KEY', 'Professional PHP 5 Programming Example');

function verify_parameters($array)
{
    $data = '';
    $ret = [];

    // 把散列存放在一个单独的变量，并且在数组本身注销散列
    $hash = $array['hash'];
    unset($array['hash']);

    // 用我们的关键字/值对构造字符串
    foreach ($array as $k => $v) {
        $data .= $k . $v;
        $ret[] = "$k=$v";
    }

    $h = new Crypt_HMAC(SECRET_KEY, 'md5');
    if ($hash != $h->hash($data)) {
        return false;
    } else {
        return true;
    }
}

$array = [
    'cause' => 'vars',
    'hash' => '6a0af635f1bbfb100297202ccd6dce53',
];

if (!verify_parameters($array)) {
    die('Dweep! Somebody tempered with our parameters.' . PHP_EOL);
} else {
    echo 'Good guys, they didn\'t touch our stuff!';
}