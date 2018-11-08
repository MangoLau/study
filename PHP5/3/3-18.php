<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 18:44
 */

class NullHandleException extends Exception
{
    function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

function printObject($obj)
{
    if ($obj == '') {
        throw new NullHandleException("printObject received NULL object");
    }
    print $obj . PHP_EOL;
}

class MyName
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

try {
    printObject(new MyName('Bill'));
    printObject(new MyName(''));
    printObject(new MyName('Jane'));
} catch (NullHandleException $exception) {
    echo $exception->getMessage(), ' in file ', $exception->getFile(), ' on line ', $exception->getLine(), PHP_EOL;
} catch (Exception $exception) {
    // 这里将不会被执行
}