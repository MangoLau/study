<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/19/16
 * Time: 11:57 PM
 */

// 获取MX纪录
getmxrr('baidu.com', $mxrr);
print_r($mxrr);

// 获取服务器的端口号
$port = getservbyname('http', 'tcp');
echo $port,PHP_EOL;

// 获取端口号的服务名
echo 'Port 80\'s default service is: ',getservbyport(80, 'udp'),PHP_EOL;