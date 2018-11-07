<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23 0023
 * Time: 19:04
 */

// 如果多个变量引用了同一个内容，修改其中任意一个变量，在其余的变量上都将有所反映。
// 在等于号后面加一个&符号就可以完成引用赋值。
$value1 = 'hello';
$value2 =& $value1; // $value1 和 $value2 都等于 ‘Hello’
$value2 = 'goodbye'; // $value1 和 $value2 都等于 ‘goodbye’
echo $value1,PHP_EOL,$value2,'<hr>';

// 引用赋值法语法，即将&符号放在所引用变量的前面
$color1 = 'red';
$color2 = &$color1;
$color2 = 'blue';
echo $color1,PHP_EOL,$color2,'<hr>';

echo '局部变量<br />';
$x = 4;
function assignx() {
    $x = 0;
    printf('$x isside function is %d <br />', $x);
}
assignx();
printf('$x ouside of function is %d <br />', $x);
echo '<hr>';

echo '<p>函数参数,任何接收参数的函数都必须在函数首部声明这些参数。虽然这些参数接受函数外部的值，但退出函数后就无法再访问这些参数;函数执行结束时，参数就被撤销。<br/></p>';
function x10($val) {
    $val = $val * 10;
    return $val;
}
$val = 3;
echo x10(4),PHP_EOL,$val,'<hr>';

echo '<p>全局变量:全局变量可以在程序的任何地方访问。但是，为了修改一个全局变量，必须在要修改该变量的函数中将其显式地声明为全局变量。</p>';
$somevar = 10;
function addit() {
    global $somevar; // 将global关键字放在一个已有变量的前面，则是告诉PHP要使用同名的变量。
    $somevar++;
    echo 'Somevar is '.$somevar,'<br />';
}
addit();

echo '<p>声明全局变量的另一种方法是使用PHP的$GLOBAL数组。</p>';
$somevar = 15;
function addit2() {
    $GLOBALS['somevar']++;
}
addit2();
echo $somevar,' Somevar is '.$GLOBALS['somevar'],'<hr>';


echo '<p>静态变量。与声明为函数参数的变量不同，函数参数在函数退出时会被撤销，而静态变量在函数退出时不会丢失值，并且还能保留这个值以便再次调用此函数时使用。</p>';
function keep_track() {
    static $count = 0; // 在变量前面加上关键字STATIC 就可以声明一个静态变量
    $count++;
    echo $count, '<br />';
}
keep_track();
keep_track();
keep_track();
keep_track();
echo '<hr>';

foreach ($_SERVER as $key=>$val) {
    echo $key, ' => ', $val ,'<br />';
}
echo '<hr>';


$r1 = 'hello';
$$r1 = ' & bye';
echo $r1, $$r1,'<br />';
echo $r1, $hello, '<hr>';


echo '常量<br />';
define('PI', 3.141592, true);
printf('The value of Pi is %f <br />', PI);
$pi2 = 2 * pi;
printf('Pi doubled equals %f', $pi2);
echo '<hr>';


echo '表达式、操作符、运算<br />';
$a = 5;
echo $a,PHP_EOL;
$a += 5;
echo $a,PHP_EOL;
$a *= 5;
echo $a,PHP_EOL;
$a /= 5;
echo $a,PHP_EOL;
$a .= 5;
echo $a,PHP_EOL;

$a = 'Mail' . ' & Femail';
echo $a,PHP_EOL;
$a .= ' are humanbeings';
echo $a,PHP_EOL,'<br />';

$inv = 15;
$inv2 = 15;
$oldInv = $inv--; // 把$inv的值赋给$oldInv，然后$inv自增
$origInv = ++$inv2; // $inv2自增，然后把新的$inv2的值赋给$origInv
echo $oldInv,PHP_EOL,$origInv,'<br />';
echo 18 << 1, PHP_EOL, 18 >> 2, PHP_EOL, 12 & 8, '<hr>';


$capital = 'Beijing';
echo "The capital of China is {$capital}<hr>";


echo 'heredoc<br>';
$website = 'http://www.mangolau.com';
echo <<<HTML
<p>What a good day!<a href="$website">Click here</a></p>
HTML;
