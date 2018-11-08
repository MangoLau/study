<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/8
 * Time: 18:57
 */
function __autoload($class_name)
{
    require_once (ROOT_PATH . '/classes/' . $class_name . '.php');
}