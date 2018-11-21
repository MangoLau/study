<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/21
 * Time: 16:39
 */

$child_pid = pcntl_fork();
if ($child_pid == 0) {
    // 在子进程中用“ls”命令代替PHP
    pcntl_exec("/bin/ls", ["-la"]);
} elseif ($child_pid != -1) {
    // 等待“ls”命令完成后退出
    pcntl_waitpid($child_pid, $status, 0);
} else {
    exit("error: $php_errormsg");
}