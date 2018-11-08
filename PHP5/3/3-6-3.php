<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:00
 */

class MyClass
{

    static $myStaticVariable;
    static $myInitializedStaticVariable = 0;

    function myMethod()
    {
        print self::$myInitializedStaticVariable . "\n";
    }
}
$obj = new MyClass();
$obj->myMethod();
MyClass::$myInitializedStaticVariable++;
print MyClass::$myInitializedStaticVariable . "\n";
$obj->myMethod();