<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/27/16
 * Time: 10:04 PM
 */

class Corporate_Drone {
    private $emploryeeid;
    private $tiecolor;
    // 为$employeeid定义一个设置方法和一个获取方法
    public function setEmployeeID($employeeid) {
        $this->emploryeeid = $employeeid;
    }
    public function getEmployeeID() {
        return $this->emploryeeid;
    }
    // 为$titlecolor定义一个设置方法和一个获取方法
    public function setTieColor($tiecolor) {
        $this->tiecolor = $tiecolor;
    }
    public function getTieColor() {
        return $this->tiecolor;
    }

    function __clone() {
        $this->tiecolor = 'blue';
    }
}