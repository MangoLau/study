<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 17:37
 */

function sanitize_vars(&$vars, $signatures, $redir_url = null)
{
    $tmp = [];
    // 遍历这些符号并且把它们添加到临时数组$tmp
    foreach ($signatures as $name => $sig) {
        if (!isset($vars[$name]) && isset($sig['required']) && $sig['required']) {
            // 如果变量在数组中不存在，则重定向
            if ($redir_url) {
                header("Location:{$redir_url}");
            } else {
                echo 'Parameter ', $name, ' not present and no redirect url';
            }
            exit;
        }
        // 把类型应用到变量中
        $tmp[$name] = $vars[$name];
        if (isset($sig['type'])) {
            settype($tmp[$name], $sig['type']);
        }
        // 用指定函数对变量进行操作，可以使用标准的PHP函数，或者使用自己定义的处理函数
        if (isset($sig['function'])) {
            $tmp[$name] = $sig['function']($tmp[$name]);
        }
    }
    $vars = $tmp;
}