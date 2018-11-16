<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/16
 * Time: 17:22
 */

require_once "HTML/Template/IT.php";

$list_items = [
    'Computer Science',
    'Nuclear Physics',
    'Rocket Science',
];
$tpl = new HTML_Template_IT('./HTML_Template_IT/templates');
$tpl ->loadTemplateFile('hello.tpl');
$tpl->setVariable('title', 'Hello, World!');
$tpl->setVariable('body', 'This is a test of HTML_Template_IT!');
foreach ($list_items as $item) {
    $tpl->setCurrentBlock("listentry");
    $tpl->setVariable('extry_text', $item);
    $tpl->parseCurrentBlock('cell');
}
$tpl->show();