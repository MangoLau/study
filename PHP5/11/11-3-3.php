<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/16
 * Time: 17:39
 */

require_once 'HTML/Template/Flexy.php';
$tpldir = './flexy';
$tpl = new HTML_Template_Flexy([
    'templateDir' => $tpldir,
    'compileDir' => 'compiled',
]);
$tpl->compile('hello.tpl');

$view = new StdClass;
$view->title = 'Hello World!';
$view->body = 'This is a test of HTML_Template_Flexy';
$view->list_entries = [
    'Computer Science',
    'Nuclear Physics',
    'Rocket Science',
];
$tpl->outputObject($view);