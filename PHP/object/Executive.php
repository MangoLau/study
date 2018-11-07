<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 5/27/16
 * Time: 10:31 PM
 */

//include_once 'Employee.php';
class Executive extends Employee {

    function __construct() {
        echo '<p>Executive object created</p>';
    }

    // 定义一个类Executive 特有的方法
    public function pillageCompany() {
        echo 'I\'m selling company assets to finance my yacht!';
    }
}