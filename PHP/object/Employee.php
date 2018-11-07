<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2016/5/27 0027
 * Time: 14:08
 */

class Employee {
    public $name; // 公共属性可以由相应的对象直接操作和访问
    private $title; // 属性只能在定义属性的类中被访问。私有属性必须通过公共接口来访问。
    protected $wage; //

    const PI = 3.1415926545;
    const  E = 2.7182818284;

    function __construct($name) {
        $this->setName($name);
    }

    protected function clockIn() {
        echo 'Member ',$this->name,' clocked in at ',date('Y-m-d H:i:s');
    }

    protected function clockOut() {
        echo 'Member ',$this->name,' clocked out at ',date('Y-m-d H:i:s');
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function __get($name) {
        echo '__get called!<br />';
        $vars = array('name', 'city');
        if (in_array($name, $vars)) {
            return $this->$name;
        } else {
            return 'No such variable!';
        }
    }
}

