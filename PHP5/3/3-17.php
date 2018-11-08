<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 18:32
 */

class Person
{
    private $name;
    function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }
}

$obj = new Person('Andi Gutmans');
print $obj . "\n";