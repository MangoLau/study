<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23 0023
 * Time: 17:22
 */
/**
 * sprintf()函数的功能与printf()相同，但它将输出付给一个字符串，而不是直接呈现到浏览器。
 */
$cost = sprintf('$%.3f', 44.43);
echo $cost,'<hr>';
$bool = 0;
var_dump((bool)$bool);