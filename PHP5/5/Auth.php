<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 17:19
 */

class Auth
{
    private $_db;

    public function __construct()
    {
        $this->_db = new mysqli('localhost', 'root', '123456', 'php5');
        if ($this->_db->connect_error) {
            die('Connect Error('. $this->_db->connect_errno .')' . $this->_db->connect_error);
        }
    }

    public function addUser($email, $password)
    {
        $sql = "INSERT INTO `users` (`email`, `passwd`) VALUES ('{$email}', '". md5($password) ."')";
        return $this->_db->query($sql);
    }

    public function authUser($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email`='{$email}' AND `passwd`='". md5($password) ."'";
        return $this->_db->query($sql, MYSQLI_ASSOC);
    }
}