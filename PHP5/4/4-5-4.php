<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 15:14
 */

class ClassOne
{
    public function callClassOne()
    {
        echo 'In Class One', PHP_EOL;
    }
}

class ClassTwo
{
    public function callClassTwo()
    {
        echo 'In Class Two', PHP_EOL;
    }
}

class ClassOneDelegator
{
    private $targets;

    public function __construct()
    {
        $this->targets[] = new ClassOne();
    }

    public function addObject($obj)
    {
        $this->targets[] = $obj;
    }

    public function __call($name, $args)
    {
        foreach ($this->targets as $obj) {
            $r = new ReflectionClass($obj);
            try {//如果方法不存在则会抛出 ReflectionException 异常。
                $method = $r->getMethod($name);
                if ($method->isPublic() && !$method->isAbstract()) {
                    return $method->invoke($obj, $args);
                }
            } catch (Exception $exception) {

            }
        }
    }
}

$obj = new ClassOneDelegator();
$obj->addObject(new ClassTwo());
$obj->callClassOne();
$obj->callClassTwo();