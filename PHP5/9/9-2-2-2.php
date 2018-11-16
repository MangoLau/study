<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 10:43
 */

$fin = fopen('readfrom', 'r');
$fout = fopen('writeto', 'w');
$desc = [
    0 => $fin,
    1 => $fout,
];
$res = proc_open('php', $desc, $pipes);
if ($res) {
    proc_close($res);
}