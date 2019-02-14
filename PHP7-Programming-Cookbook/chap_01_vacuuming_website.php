<?php
/**
 * Created by PhpStorm.
 * User: liuhongwei
 * Date: 2019-02-14
 * Time: 22:49
 */

define('DEFAULT_URL', 'http://oreilly.com/');
define('DEFAULT_TAG', 'a');

require __DIR__ . '/Application/Autoload/Loader.php';
Application\Autoload\Loader::init(__DIR__ . '/');

$vac = new \Application\Web\Hoover();

$url = DEFAULT_URL;
$tag = DEFAULT_TAG;

echo 'Dump of Tags:' . PHP_EOL;
var_dump($vac->getTags($url, $tag));