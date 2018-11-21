<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/21
 * Time: 16:31
 */

$child_pid = pcntl_fork();
if ($child_pid == -1) {
    die("pcntl_fork() failed: $php_errormsg");
} elseif ($child_pid) {
    printf("I am the parent, my pid is %d and my child's pid is %d.\n", posix_getpid(), $child_pid);
} else {
    printf("I am the child, my pid is %d.\n", posix_getpid());
}