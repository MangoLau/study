<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/27 0027
 * Time: 14:29
 */
include_once 'Employee.php';
include_once 'book.php';
include_once 'Visitors.php';
include_once 'Corporate_Drone.php';
include_once 'Executive.php';
include_once 'CEO.php';
//use object\Employee;

$employee = new Employee('11');
$employee->name = 'Mango Lau';
$employee->fight = 'fight';
echo 'Name:',$employee->name,'<br />';
echo 'Fight:',$employee->fight,'<br />';
echo Employee::PI,'<br />';


$book = new book('0615303889');

$visitors = new Visitors();
echo Visitors::getVisitors(),'<br />';
$visitors2 = new Visitors();
echo Visitors::getVisitors(),'<br />';

if ($employee instanceof Employee)
    echo 'yes<br />';
else
    echo 'no<br />';

if (class_exists('Employee')) {
    echo 'exists';
    var_dump(get_class($employee));
    var_dump(get_class_vars('Employee'));
    var_dump(get_class_methods('Employee'));
} else {
    echo 'notexists';
}

echo '<hr><p>clone关键字克隆对象</p>';
// 新建Corporate_Drone 对象，并设置ID和titlecolor
$drone1 = new Corporate_Drone();
$drone1->setEmployeeID('12345');
$drone1->setTieColor('red');
// 克隆$drone1 对象
$drone2 = clone $drone1;
// 设置$drone2 的ID属性
$drone2->setEmployeeID('67890');
// 输出$drone1 和 $drone2 的ID属性
printf('Drone1 employeeID: %d<br />', $drone1->getEmployeeID());
printf('Drone2 employeeID: %d<br />', $drone2->getEmployeeID());
printf('Drone1 tieColor: %s<br />', $drone1->getTieColor());
printf('Drone2 tieColor: %s<br />', $drone2->getTieColor());

echo '<hr><p>继承</p>';
$exec = new Executive();
$exec->setName('Exec');
echo $exec->getName(),'<br />';
$exec->pillageCompany();

echo '<p>继承与构造函数</p>';
$exec2 = new Executive('Dennis');
echo $exec2->getName();
$ceo = new CEO('CEO');
echo 'My name is: ',$ceo->getName(),'<br />';