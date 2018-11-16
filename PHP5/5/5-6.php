<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/12
 * Time: 10:06
 */

ob_start();

function check_auth($email, $password)
{
    if ($email == '853779003@qq.com' && $password = '123456') {
        return 1;
    } else {
        return false;
    }
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
if (isset($_POST['login']) && ($_POST['login'] == 'Log in') && ($uid = check_auth($_POST['email'], $_POST['password']))) {
    // 用户成功登录，设置cookie
    setcookie('uid', $uid, time() + 14400, '/');
    header('Location: http://study.mangolau.com/php5/5/5-6.php');
    exit();
} else {
?>
    <h1>Log-in</h1>
    <form method="post" action="5-6.php">
        <div>Email:<input type="text" name="email"/></div>
        <div>Password:<input type="text" name="password"/></div>
        <div><input type="submit" name="login" value="Log in"/></div>
    </form>
<?php
}?>
</body>
</html>
