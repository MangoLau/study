<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 10:53
 */

$descs = [
    ['pipe', 'r'],
    ['file', 'output', 'w'],
    ['file', 'errors', 'w'],
];
$res = proc_open('php', $descs, $pipes);

if (is_resource($res)) {
    fputs($pipes[0], '<?php echo "Hello you!\n";?>');
    fclose($pipes[0]);
    proc_close($res);
}