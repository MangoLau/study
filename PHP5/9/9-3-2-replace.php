<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 17:53
 */

$str = '[link url="http://php.net"]PHP[/link] is cool.';
$pattern = '@\[link\ url="([^"]+)"\](.*?)\[/link\]@';
$replacement = '<a href="\\1">\\2</a>';
$str = preg_replace($pattern, $replacement, $str);
echo $str, PHP_EOL;

// --------------------------------------
function format_string($matches)
{
    return ucwords("{$matches[2]} {$matches[1]}");
}

$names = [
    'rethans, derick',
    'saher bakken, stig',
    'gutmans, andi'
];
$names = preg_replace_callback(
    '@([^,]+).\ (.*)@', //pattern
    'format_string',// callback function
    $names// array with 'subjects'
    );
print_r($names);
echo PHP_EOL, PHP_EOL;

// --------------------------------------
$show_with_vat = true;
$format = '&euro; %.2f';
$exchange_rate = 1.2444;

function currency_output_vat($data)
{
    $price = $data[1];
    $vat_percent = $data[2];
    $show_vat = isset($GLOBALS['show_with_vat']) && $GLOBALS['show_with_vat'];
    $amount = ($show_vat) ? $price * (1 + $vat_percent / 100) : $price;
    return sprintf($GLOBALS['format'], $amount / $GLOBALS['exchange_rate']);
}

$data = "This item costs {amount: 27.95 %19%} and the other one costs {amount: 29.95 %0%}.\n";
echo preg_replace_callback('/\{amount\:\ ([0-9.]+)\ \%([0-9.]+)\%\}/', 'currency_output_vat', $data), PHP_EOL;