<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/21
 * Time: 16:56
 */

function sigint_handler($signal)
{
    echo 'Interrupt!', PHP_EOL;
    exit;
}

pcntl_signal(SIGINT, 'sigint_handler');

declare(ticks = 1) {
    while (sleep(1));
}