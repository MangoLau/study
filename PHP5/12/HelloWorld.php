<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/19
 * Time: 10:57
 */

class HelloWorld
{

    function __construct($html = true)
    {
        if ($html) {
            echo 'Hello, World!<br/>', PHP_EOL;
        } else {
            echo 'Hello, World!', PHP_EOL;
        }
    }
}