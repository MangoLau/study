<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 10:48
 */

$descs = [
    ['pipe', 'r'],
    ['pipe', 'w'],
];
$res = proc_open('php', $descs, $pipes);

if (is_resource($res)) {
    fputs($pipes[0], '<?php echo "Hello you!\n";?>');
    fclose($pipes[0]);

    while (!feof($pipes[1])) {
        $line = fgets($pipes[1]);
        echo urlencode($line);
    }
    proc_close($res);
}