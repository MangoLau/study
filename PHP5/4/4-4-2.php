<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 14:04
 */

class Logger
{
    private static $instance = null;

    /**
     * @return Logger
     */
    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance;
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function log($str)
    {
        // 注意日志
    }
}

Logger::getInstance()->log("Checkpoint");