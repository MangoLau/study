<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/19/16
 * Time: 6:23 PM
 */
$email = '853779003@qq.com';
$domain = explode('@', $email);
$domain = 'mangolau.com';
$valid = checkdnsrr($domain[1], 'ANY');
if ($valid)
    echo 'This domain exists!',PHP_EOL;
else
    echo 'This domain not exists!',PHP_EOL;

// DNS资源纪录
$res = dns_get_record('www.baidu.com', DNS_ALL);
print_r($res);

