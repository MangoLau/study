<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 16:38
 */

class Person
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }
}

$judy = new Person("Judy");
$joe = new Person("Joe");

print $judy->getName() . "\n";
print $joe->getName() . "\n";