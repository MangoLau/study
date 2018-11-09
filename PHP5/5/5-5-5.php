<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 17:38
 */

require_once 'Auth.php';
require_once 'sanitize.php';

$sigs = [
    'email' => [
        'required' => true,
        'type' => 'string',
        'function' => 'addslashes',
    ],
    'passwd' => [
        'required' => true,
        'type' => 'string',
        'function' => 'addslashes',
    ],
];

$params = [
    'email' => '853779003@qq.com',
    'passwd' => 123456,
];
sanitize_vars($params, $sigs);

$a = new Auth();
$a->addUser($params['email'], $params['passwd']);