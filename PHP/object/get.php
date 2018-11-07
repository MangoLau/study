<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2016/5/27 0027
 * Time: 16:08
 */
include_once 'Employee.php';

$employee = new Employee();
$employee->name = 'Mario';
echo $employee->name,'<br />';
echo $employee->age;