<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 15:08
 */

// 阅读器
while (true) {
    $fp = fopen('testfile', 'r');
    echo 'Waiting fo lock ...';
    flock($fp, LOCK_SH);
    echo 'ok', PHP_EOL;
    // 这里，我们请求一个共享锁。
    //如果文件已经设置了一个排它锁的话，共享锁将无法授予，但是如果文件有另外一个共享锁或者文件没有任何锁定的话，它将可以被授予。
    //这意味着可以同时又多个读取脚本从这个文件读取数据，除非有一个写入的脚本对文件执行了排它锁定。

    echo fgets($fp, 2048);
    echo "Releasing lock...";
    flock($fp, LOCK_UN);
    echo 'ok', PHP_EOL;

    fclose($fp);
    sleep(1);
}