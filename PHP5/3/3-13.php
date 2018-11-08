<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 18:13
 */

interface Loggable
{
    function logString();
}

class Person implements Loggable
{
    private $name, $address, $idNumber, $age;

    function logString()
    {
        return "class Person: name = {$this->name}, ID = {$this->idNumber}\n";
    }

    //...
}

class Product implements Loggable
{
    private $name, $price, $expiryDate;

    function logString()
    {
        return "class Product: name = {$this->name}, price = {$this->price}\n";
    }

    //...
}

function Mylog($obj)
{
    if ($obj instanceof Loggable) {
        print $obj->logString();
    } else {
        echo 'Error: Object doesn\'t support Loggable interface', PHP_EOL;
    }
}

$person = new Person();
$product = new Product();
//...
Mylog($person);
Mylog($product);