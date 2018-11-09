<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 10:28
 */

class StrictCoordinateClass
{
    private $arr = ['x' => null, 'y' => null];

    function __get($name)
    {
        if (array_key_exists($name, $this->arr)) {
            return $this->arr[$name];
        } else {
            echo 'Error: Can\'t read a property other than x & y', PHP_EOL;
        }
    }

    function __set($name, $value)
    {
        if (array_key_exists($name, $this->arr)) {
            $this->arr[$name] = $value;
        } else {
            echo 'Error: Can\'t write a property other than x & y', PHP_EOL;
        }
    }
}

/**
 * __call 试用
 */
class HelloWorld
{
    function display($count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo 'Hello, World', PHP_EOL;
        }
        return $count;
    }
}

class HelloWorldDelegator
{
    private $obj;
    function __construct()
    {
        $this->obj = new HelloWorld();
    }

    function __call($name, $arguments)
    {
        return call_user_func_array([$this->obj, $name], $arguments);
    }
}

$obj = new StrictCoordinateClass();
$obj->x = 1;
echo $obj->x, PHP_EOL;
$obj->n = 2;
echo $obj->n;
echo '----------', PHP_EOL;

$callObj = new HelloWorldDelegator();
echo $callObj->display(3);