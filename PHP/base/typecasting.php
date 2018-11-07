<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23 0023
 * Time: 17:51
 */
// 将整数转换成双精度数
$score = (double)13;
echo $score,'<hr>';

// 将一个双精度数强制转换为整数，将使整数值向下取整，而不考虑小数值。
$score = (int)13.8;
echo $score,'<hr>';

$sentence = 'This is a sentence';
echo (int) $sentence,'<hr>';

// 将一个数据类型强制转换成数组中的一个成员。所转换的值将成为数组中的第一个成员
$score = 14;
$scoreboard = (array)$score;
echo $scoreboard[0],'<hr>'; // 注意，不能把这作为向数组增加

// 任何数据类型都可以转换为对象。结果是，该变量成为了对象的一个属性，该属性名为scalar
$model = 'MangoLau';
$obj = (object)$model;
var_dump($obj);
echo $obj->scalar,'<hr>';

$total = 5; // 整数
$count = '13'; // 字符串
$total += $count; // $total = 18;(整数)
echo $total,'<hr>';

// 最前面的$total 字符串以整数值开头，所以计算中就使用了这个值。但是，如果它以非数值的内容开头，则值为0.
$total = '38 women\'s day';
$incoming = 10;
$total += $incoming;
echo $total,'<hr>'; // 48

$total = '1.0';
if ($total) echo 'We\'re in positive territory!','<hr>'; // 为了计算if语句的值，字符串被转换为布尔类型。

// 如果数学计算中用到包含.、e或E（表示科学计数法）的字符串，这个字符串将作为浮点数进行计算
$val1 = '1.2e3';
$val2 = 2;
echo $val1 * $val2,'<hr>';

echo '获取类型<br>';
$cast = array(1,2,3);
echo gettype($cast),'<hr>';

$item = 43;
printf('The variable $item is of type array: %d <br />', is_array($item));
printf('The variable $item is of type integer: %d <br />', is_integer($item));
printf('The variable $item is numeric: %d <br />', is_numeric($item));