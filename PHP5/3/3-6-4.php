<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:05
 */

class PrettyPrinter
{
    static function printHelloWorld()
    {
        print "Hello, Wrold";
        self::printNewline();
    }

    static function printNewline()
    {
        print "\n";
    }
}

PrettyPrinter::printHelloWorld();