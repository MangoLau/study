<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/13
 * Time: 15:40
 */

require_once 'XML/Tree.php';

// 创建文档和根节点
$dom = new XML_Tree;
$html =& $dom->addRoot('html', '', [
    'xmlns' => 'http://www.w3.org/1999/xhtml',
    'xml:lang' => 'en',
    'lang' => 'en',
]);

// 创建head和title元素
$head =& $html->addChild('head');
$title =& $head->addChild('title', 'XML Example');

// 创建body和p元素
$body =& $html->addChild('body', '', [
    'background' => 'bg.png'
]);
$p =& $body->addChild('p');

// 增加"Moved to"
$p->addChild(null, 'Moved to');

// 增加a元素
$p->addChild('a', 'example.org', [
    'href' => 'http://example.org',
]);

// 增加“.”、br和“foo & bar”
$p->addChild(null, '.');
$p->addChild('br');
$p->addChild(null, 'foo & bar');

// 输出显示的内容
$dom->dump();