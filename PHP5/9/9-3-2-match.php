<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/14
 * Time: 17:45
 */

$raw_document = file_get_contents('http://www.w3.org/tr/css21');
$doc = html_entity_decode($raw_document);
$count = preg_match_all('/<(?P<email>([a-z.]+).?@[a-z0-9]+\.[a-z]{1,6})>/Ui', $doc, $matches);
var_dump($matches);