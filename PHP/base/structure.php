<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25 0025
 * Time: 14:15
 */
$post = 451;
$secretNumber = 453;
if ($post == $secretNumber)
    echo '<p>Congratulations!</p>';
elseif (abs($post - $secretNumber) < 10)
    echo '<p>You\'re getting close!</p>';
else
    echo '<p>Sorry!</p>';
echo '<hr>';


echo '<p>switch语句。用于需要大量对比时。</p>';
$category = 'weather';
switch ($category) {
    case 'news' :
        echo '<p>What\'s happening around the world!</p>';
        break;
    case 'weather' :
        echo '<p>Your weekly forecast</p>';
        break;
    case 'sports' :
        echo '<p>The team won the fanal yesterday!</p>';
        break;
    default:
        echo '<p>Welcome to my web site!</p>';
}
echo '<hr>';


echo '<p>while循环语句</p>';
$i = 1;
while($i < 10) {
    printf('%d squared = %d<br />', $i, pow($i, 2));
    $i++;
}
echo '<p>嵌入多个条件表达式</p>';
$line = 1;
$fh = fopen('../readme.md', 'r');
while (! feof($fh) && $line <= 3) {
    $l = fgets($fh, 1024);
    echo $l, '<br />';
    $line++;
}
fclose($fh);
echo '<hr>';


echo '<p>do...while循环语句</p>
<p>do...while循环语句是while的一种变体，它在代码块的结束处验证循环条件，而不是在开始处。</p>';
$i = 6;
do {
    printf('%d squared = %d<br />', $i, pow($i, 2));
    $i++;
} while ($i <= 10);
