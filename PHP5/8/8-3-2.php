<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/13
 * Time: 14:42
 */

$dom = new DOMDocument();
$dom->load('./test1.xhtml');
$root = $dom->documentElement;

process_children($root);

function process_children($node)
{
    $children = $node->childNodes;

    foreach ($children as $elem) {
        if ($elem->nodeType == XML_TEXT_NODE) {
            if (strlen(trim($elem->nodeValue))) {
                echo trim($elem->nodeValue), PHP_EOL;
            }
        } else if ($elem->nodeType == XML_ELEMENT_NODE) {
            process_children($elem);
        }
    }
}