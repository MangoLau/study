<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 16:36
 */

class MyClass
{
    function __destruct()
    {
        print"An object of type MyClass is being destroyed\n";
    }
}

$obj = new MyClass();
$obj = NULL;