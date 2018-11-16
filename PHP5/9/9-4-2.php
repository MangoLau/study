<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/15
 * Time: 11:59
 */

echo '<pre>';
echo strftime('%D'), PHP_EOL;
echo strftime("%B"), PHP_EOL;
echo strftime("%Z"), PHP_EOL;// 时区
echo gmdate("T"), PHP_EOL;// 时区
echo strftime("%V"), PHP_EOL;// 年中第几个星期
echo gmdate("W"), PHP_EOL;// 年中第几个星期
echo strftime("%W"), PHP_EOL;// 星期数