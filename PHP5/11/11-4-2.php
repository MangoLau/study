<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/16
 * Time: 18:08
 */

require_once 'Auth.php';

$auth = new Auth('File', '.htpasswd', 'login_function');
$auth->start();
if (!$auth->getAuth()) {
    exit;
}

if (!empty($_REQUEST['logout'])) {
    $auth->logout();
    echo "<h1>Logged out</h1>\n";
    echo "<a href=\"{$_SERVER['PHP_SELF']}\">Log in again</a>\n";
    exit;
}

echo '<h1>Logged in!</h1>',PHP_EOL;

if (!empty($_REQUEST['dump'])) {
    echo '<pre>SESSION=';
    var_dump($_SESSION);
    echo '</pre>', PHP_EOL;
} else {
    echo "<a href='{$_SERVER['PHP_SELF']}?dump=1'>Dump Session</a><br>", PHP_EOL;
}

echo "<a href='{$_SERVER['PHP_SELF']}?logout=1'>Log Out</a>";

// ---- 执行在此结束 ----
function login_function()
{
    echo '<h1>Please Log In</h1>', PHP_EOL;
    echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>",PHP_EOL;
    echo "User name:<input name='username'>", PHP_EOL;
    echo "Password:<intpu name='password'>", PHP_EOL;
    echo "<input type='submit' value='Log In'>", PHP_EOL;
    echo '</form>', PHP_EOL;
    exit;
}