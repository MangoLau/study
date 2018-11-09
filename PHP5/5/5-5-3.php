<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 16:51
 */

require_once 'Crypt_HMAC.php';

// RFC对你使用的散列函数推荐了一个大于输出散列的键值大小（16针对md5()，而20针对sha1()）。
define('SECRET_KEY', 'Professional PHP 5 Programming Example');

function create_parameters($array)
{
    $data = '';
    $ret = [];
    // 用我们的键/值对来构造字符串
    foreach ($array as $k => $v) {
        $data .= $k . $v;
        $ret[] = "$k=$v";
    }

    $h = new Crypt_HMAC(SECRET_KEY, 'md5');
    $hash = $h->hash($data);
    $ret[] = "hash={$hash}";
    return implode('&amp;', $ret);
}

echo '<a href="script.php?"'.create_parameters(['cause' => 'vars']) . '">err!</a>';