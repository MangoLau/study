<?php
/**
 * Created by PhpStorm.
 * User: MangoLau
 * Date: 2016/5/26 0026
 * Time: 10:38
 */
echo '<p>标准的PHP发行包中有1000多个标准函数，假设函数库已经编译到安装发行包中，或者通过include()或require()语句包含了相应函数库，使得函数可用，那么指定函数名就可以调用函数。</p>';
$value = pow(5, 3);
echo $value,'<br />';

echo pow(5, 3),'<br />';

echo 'Five raised to the third power equals ',pow(5, 3),'.<br />';

printf('Five raised to the third power equals %d.<hr>', pow(5, 3));


echo '创建函数<br />';
function generateFooter () { // 定义函数
    echo 'Copyright 2016 MangoLau';
}
generateFooter(); // 调用函数
echo '<hr>';


echo '<p>按值传递参数</p>';
function  calcSalesTax($price, $tax) {
    $total = $price + ($price * $tax);
    echo 'Total cost: ',$total,'<br />';
}
calcSalesTax(18.00, 0.57); // 静态值调用
$price = 50;
$tax = 0.57;
calcSalesTax($price, $tax); // 传递变量调用
echo '<hr>';


echo '<p>按引用传递参数</p>';
$cost = 20.99;
$tax = 0.0575;
function calculateCost(&$cost, $tax) {
    // 修改$cost变量
    $cost = $cost + ($cost * $tax);
    // 随机更改$tax变量
    $tax += 4;
}
calculateCost($cost, $tax);
printf('Tax is %01.2f%% <br />', $tax*100);
printf('Cost is: $%01.2f', $cost);
echo '<hr>';


echo '<p>默认参数值</p>';
function clacSalesTax2($price, $tax = .0675) { // $tax设定默认值为0.0675
    $total = $price + ($price * $tax);
    echo 'Total cost: ',$total;
}
$price = 15.47;
clacSalesTax2($price); // 在不指定第二个参数的情况下，第二个参数值默认为0.0675
echo '<br /><b>默认参数值必须位于参数列表末尾且为常数表达式，而不能指定为函数调用或变量等非常量值。</b><br />';

echo '<b>如果指定了多个可选参数，可以选择性地传递某些参数。</b><br />';
function calculate($price, $price2 = 0, $price3 = 0) {
    echo $price + $price2 + $price3;
}
calculate(15, '', 6); // 调用时可以只传第一和第三个参数


echo '<hr><p>从函数返回值</p>';
function calcSalesTax3($price, $tax=.0675) {
    // 直接返回计算值
//    return $price + ($price * $tax);
    $total = $price + ($price * $tax);
    return $total;
}
echo calcSalesTax3(12),'<hr>';


echo '<p>返回多个值：语言构造list()</p>';
$colors = array('red', 'blue', 'green');
list($red, $blue, $green) = $colors; // 执行list()构造后，$red, $blue, $green 分别被赋值为 red,blue,green
echo $red,PHP_EOL,$blue,PHP_EOL,$green,'<br />';


function retrieveUserProfile() {
    $user = array(
        'Jason Gilmore',
        'jason@example.com',
        'English'
    );
    return $user;
}
list($name, $email, $language) = retrieveUserProfile();
echo "Name: $name, Email: $email, Language: $language<hr>";


echo '<p>递归函数</p>';
/**
 * @param $pNum 标识还款编号
 * @param $periodicPayment 标识每月总的还款额
 * @param $balance 表示剩余贷款额
 * @param $monthlyInterest 指定了每月的利率
 * @return int
 */
function amortizationTable($pNum ,$periodicPayment, $balance, $monthlyInterest) {
    // 计算支付利息
    $paymentInterest = round($balance*$monthlyInterest, 2);
    // 计算还款额
    $paymentPrincipal = round($periodicPayment - $paymentInterest, 2);
    // 用余额减去还款额
    $newBalance = round($balance - $paymentPrincipal, 2);
    // 如果余额<每月还款，设置为0
    if ($newBalance < $paymentPrincipal)
        $newBalance = 0;

    printf('<tr><td>%d</td>', $pNum);
    printf('<td>$%s</td>', number_format($newBalance, 2));
    printf('<td>$%s</td>', number_format($periodicPayment, 2));
    printf('<td>$%s</td>', number_format($paymentPrincipal, 2));
    printf('<td>$%s</td>', number_format($paymentInterest, 2));

    #if balance not yet 0, recursively call amortizationTable()
    if ($newBalance > 0) {
        $pNum++;
        amortizationTable($pNum, $periodicPayment, $newBalance, $monthlyInterest);
    } else {
        return 0;
    }
}

// 贷款余额
$balance = 10000.00;
// 贷款利率
$interestRate = .0575;
// 每月利率
$monthlyInterest = $interestRate / 12;
// 贷款期限，单位为年
$termLength = 5;
// 每年支付次数
$paymentsPerYear = 12;
// 付款迭代
$paymentNumber = 1;
// 确定支付总次数
$totalPayments = $termLength * $paymentsPerYear;
// 确定分期付款的利息部分
$intCalc = 1 + $interestRate / $paymentsPerYear;
// 确定定期支付
$periodicPayment = $balance * pow($intCalc, $totalPayments) * ($intCalc - 1) / (pow($intCalc,$totalPayments) - 1);
// 每月还款限额限制到小数点后两位
$periodicPayment = round($periodicPayment,2);
// 创建表
echo '<table width="50%" align="center" border="1">';
echo '<tr>
        <th>Payment Number</th><th>Balance</th>
        <th>Payment</th><th>Principal</th><th>Interest</th>
    </tr>';
// 创建递归函数
amortizationTable($paymentNumber, $periodicPayment, $balance, $monthlyInterest);
// 关闭表
echo '</table><hr>';