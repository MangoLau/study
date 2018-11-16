<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 15:08
 */

// 编辑器
while (true) {
    $fp = fopen('testfile', 'w');
    echo 'Waiting fo lock ...';
    flock($fp, LOCK_EX);// 尝试请求一个文件的排它锁并且在该锁定被获取之前阻挡进一步操作。一个排它锁将只能在文件没有其他锁定时授予。
    echo 'ok', PHP_EOL;

    $date = date('Y-m-d H:i:s');
    echo $date, PHP_EOL;
    fputs($fp, $date . PHP_EOL);
    sleep(1);

    echo "Releasing lock...";
    flock($fp, LOCK_UN);// 释放锁定
    echo 'ok', PHP_EOL;

    fclose($fp);
    usleep(1);
}