<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/25/16
 * Time: 9:43 PM
 */
for ($kilometers = 1; $kilometers <= 5; $kilometers++) {
    printf('%d kilometers = %f miles <br />', $kilometers, $kilometers*0.62140);
}

for ($kilometers = 1; ; $kilometers++) {
    if ($kilometers > 5) break;
    printf('%d kilometers = %f miles <br />', $kilometers, $kilometers*0.62140);
}

$kilometers = 1;
for (; ; ){
    if ($kilometers > 5) break;
    printf('%d kilometers = %f miles <br />', $kilometers, $kilometers*0.62140);
    $kilometers++;
}
echo '<hr>';


$links = array('www.apress.com', 'www.apache.org', 'www.php.net');
echo '<b>Online resources</b>: <br />';
foreach ($links as $link) {
    echo '<a href="http://'.$link.'">'.$link.'</a><br />';
}

$links = array(
    'The apache webs erver' => 'www.apache.org',
    'Apress' => 'www.apress.com',
    'The PHP Scripting Language' => 'www.php.net',
);
echo '<b>Online resources</b>: <br />';
foreach ($links as $k => $link) {
    echo '<a href="http://'.$link.'">'.$k.'</a><br />';
}
echo '<hr>';


echo '<p>如果循环中遇到break语句，将立即结束循环</p>';
$primes = array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47);
for ($i = 1; $i <= 1000; $i++) {
    $randNumber = rand(1, 50);
    if (in_array($randNumber, $primes)) {
        printf('Prime number found: %d<br />', $randNumber);
        break;
    }
    else
        printf('Non-prime number found: %d<br />', $randNumber);
}
echo '<hr>';


echo '<p>通过添加goto语句，PHP5.3以上，你可以直接跳到一个循环或条件构造之外的某个特定位置</p>';
for ($i =1; $i < 10; $i++) {
    $randNumber = rand(1, 50);
    if ($randNumber < 10)
        goto less;
    else
        echo 'Number greater than 10: ',$randNumber,'<br />';
}
less:
    echo 'Number less than 10: ',$randNumber,'<br />';
echo '<hr>';


echo '<p>continue语句使当前循环迭代执行结束，并从下一次迭代开始执行。</p>';
$username = array('Grace', 'Doris', 'Gray', 'Nate', 'missing', 'Tom');
for ($x = 0; $x < count($username); $x++) {
    if ($username[$x] == 'missing') continue;
    printf('Staff member: %s <br/>', $username[$x]);
}