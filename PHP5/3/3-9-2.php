<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:32
 */

class Animal
{
    function makeSound()
    {
        echo 'Error: This method should be re-implemented in the children', PHP_EOL;
    }
}

class Cat extends Animal
{
    function makeSound()
    {
        echo 'miau', PHP_EOL;
    }
}

class Dog extends Animal
{
    function makeSound()
    {
        echo 'wuff', PHP_EOL;
    }
}

function printTheRightSound($obj)
{
    if ($obj instanceof Animal) {
        $obj->makeSound();
    } else {
        echo 'Error: Passed Wrong kind of object', PHP_EOL;
    }
}

printTheRightSound(new Cat());
printTheRightSound(new Dog());