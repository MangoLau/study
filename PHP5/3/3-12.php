<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:54
 */

abstract class Shape
{
    protected $x, $y;

    function setCenter($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    abstract function draw();//抽象方法
}

class Square extends Shape
{
    function draw()
    {
        // TODO: Implement draw() method.
    }
}

class Circle extends Shape
{
    function draw()
    {
        // TODO: Implement draw() method.
    }
}