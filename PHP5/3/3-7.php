<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:12
 */

class MyColorEnumClass
{
    const RED = "Red";
    const GREEN = "Green";
    const BLUE = "Blue";

    function printBlue()
    {
        print self::BLUE . "\n";
    }
}

print MyColorEnumClass::RED . "\n";
$obj = new MyColorEnumClass();
$obj->printBlue();