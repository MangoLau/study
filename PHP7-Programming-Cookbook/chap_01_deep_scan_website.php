<?php
/**
 * Created by PhpStorm.
 * User: liuhongwei
 * Date: 2019-02-18
 * Time: 22:36
 */

define('DEFAULT_URL', 'http://oreilly.com/');
define('DEFAULT_TAG', 'a');

require __DIR__ . '/Application/Autoload/Loader.php';
Application\Autoload\Loader::init(__DIR__ . '/');

$deep = new Application\Web\Deep();

$url = strip_tags($_GET['url'] ?? DEFAULT_URL);
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG);

foreach ($deep->scan($url, $tag) as $item) {
    $src = $item['attributes']['src'] ?? null;
    if ($src && (stripos($src, 'png') || stripos($src, 'jpg'))) {
        printf('<br><img src="%s"/>', $src);
    }
}