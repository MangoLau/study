<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:27
 */

class Cat
{
    function miau()
    {
        echo 'miau', PHP_EOL;
    }
}

class Dog
{
    function wuff()
    {
        echo 'wuff', PHP_EOL;
    }
}

function printTheRightSound($obj)
{
    if ($obj instanceof Cat) {
        $obj->miau();
    } else if ($obj instanceof Dog) {
        $obj->wuff();
    } else {
        echo 'Error: Passed Wrong kind of object', PHP_EOL;
    }
}

printTheRightSound(new Cat());
printTheRightSound(new Dog());

//此例子不可扩展