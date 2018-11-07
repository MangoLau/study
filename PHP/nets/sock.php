<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/19/16
 * Time: 11:58 PM
 */

// 建立套接字连接
// 在端口80上与www.baidu.com建立连接
$http = fsockopen('www.baidu.com', 80);
// 给服务器发送一个请求
$reg = 'GET / HTTP/1.1\r\n';
$reg .= 'Host: www.baidu.com\r\n';
$reg .= 'Connection: Close\r\n\r\n';

fputs($http, $reg);
// 输出请求结果
while(!feof($http)) {
    echo fgets($http, 1024);
}
// 关闭连接
fclose($http);