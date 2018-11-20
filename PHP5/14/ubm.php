<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/20
 * Time: 17:57
 */

register_shutdown_function('micro_benchmark_summary');
$ubm_timing = [];

function micro_benchmark($label, $impl_func, $iterations = 1)
{
    global $ubm_timing;
    echo "benchmarking '{$label}'...";
    flush();
    $start = current_usercpu_rusage();
    call_user_func($impl_func, $iterations);
    $ubm_timing[$label] = current_usercpu_rusage() - $start;
    echo '<br/>', PHP_EOL;
    return $ubm_timing[$label];
}

function micro_benchmark_summary()
{
    global $ubm_timing;
    if (empty($ubm_timing)) {
        return;
    }
//    print_r($ubm_timing);die;
    arsort($ubm_timing);
    reset($ubm_timing);
//    $slowest = current($ubm_timing);
    end($ubm_timing);
    echo '<h2>And the winner is: ';
    echo key($ubm_timing), '</h2>', PHP_EOL;
    echo '<table border=1>', PHP_EOL, '<tr>', PHP_EOL, '<td>&nbsp;</td>', PHP_EOL;
    foreach ($ubm_timing as $label => $usercpu) {
        echo '<th>', $label, '</th>', PHP_EOL;
    }
    echo '</tr>', PHP_EOL;
    $ubm_timing_copy = $ubm_timing;
    foreach ($ubm_timing_copy as $label => $usercpu) {
        echo "<tr>\n<td><b>{$label}</b><br/>";
        printf("%.3fs</td>\n", $usercpu);
        foreach ($ubm_timing as $label2 => $usercpu2) {
            $percent = (($usercpu2 / $usercpu) - 1) * 100;
            if ($percent > 0) {
                printf("<td>%.3fs<br/>%.1f%% slower", $usercpu2, $percent);
            } elseif ($percent < 0) {
                printf("<td>%.3f<br/>%.1f%% faster", $usercpu2, -$percent);
            } else {
                echo "<td>&nbsp;";
            }
            echo "</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
}

function current_usercpu_rusage()
{
    $ru = getrusage();
    return $ru['ru_utime.tv_sec'] + ($ru['ru_utime.tv_usec'] / 1000000.0);
}