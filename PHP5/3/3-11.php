<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:47
 */

class Rectangle
{
    public $name = __CLASS__;
}

class Square extends Rectangle
{
    public $name = __CLASS__;
}

class Circle
{
    public $name = __CLASS__;
}

function checkIfRectangle($shape)
{
    if ($shape instanceof Rectangle) {
        echo $shape->name . ' is a rectangle' , PHP_EOL;
    }
}

function checkIfNotRectangle($shape)
{
    if (!($shape instanceof Rectangle)) {
        echo $shape->name . ' is not a rectangle' , PHP_EOL;
    }
}

checkIfRectangle(new Square());
checkIfRectangle(new Circle());