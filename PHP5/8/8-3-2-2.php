<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/13
 * Time: 14:42
 */

$dom = new DOMDocument();
$html = $dom->createElement('html');
$html->setAttribute("xmlns", 'http://www.w3.org/1999/xhtml');
$html->setAttribute('xml:lang', 'en');
$html->setAttribute('lang', 'en');
$dom->appendChild($html);

$head = $dom->createElement('head');
$html->appendChild($head);
$title = $dom->createElement('title');
$title->appendChild($dom->createTextNode('XML Example'));
$head->appendChild($title);

// 创建body元素
$body = $dom->createElement('body');
$body->setAttribute('background', 'bg.png');
$html->appendChild($body);
// 创建p元素
$p = $dom->createElement('p');
$body->appendChild($p);

// 增加"Moved to"
$text = $dom->createTextNode("Moved to ");
$p->appendChild($text);
// 增加a元素
$a = $dom->createElement('a');
$a->setAttribute('href', 'http://example.org/');
$a->appendChild($dom->createTextNode('example.org'));
$p->appendChild($a);
// 增加"."、br和"foo & bar"
$text = $dom->createTextNode('.');
$p->appendChild($text);
$br = $dom->createTextNode('foo & bar');
$p->appendChild($text);

echo $dom->saveXML();