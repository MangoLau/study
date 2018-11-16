<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 18:19
 */

$str = 'This is an example for preg_split().';
$words = preg_split('@[\W]+@', $str);
print_r($words);
echo PHP_EOL, PHP_EOL;

$str = 'This is an example for preg_split().';
$words = preg_split('@[\W]+@', $str, 2);
print_r($words);