<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 10:36
 */

$fp = popen('ls -l ', 'r');
while (!feof($fp)) {
    echo fgets($fp);
}
pclose($fp);