<?php
/**
 * Created by PhpStorm.
 * User: MangoLau
 * Date: 2016/5/27 0027
 * Time: 16:38
 */

class Visitors {

    private static $visitors = 0;

    function __construct() {
        self::$visitors++;
    }

    static function getVisitors() {
        return self::$visitors;
    }
}