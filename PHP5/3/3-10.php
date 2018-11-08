<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 17:41
 */

class Ancestor
{
    const NAME = 'Ancestor';

    function  __construct()
    {
        echo 'In '. self::NAME . ' constructor' . PHP_EOL;
    }
}

class Child extends Ancestor
{
    const NAME = 'Child';

    function __construct()
    {
        parent::__construct();
        echo 'In ' . self::NAME . ' constructor' . PHP_EOL;
    }
}
$obj = new Child();