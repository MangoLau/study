<?php
/**
 * Created by PhpStorm.
 * User: mangolau
 * Date: 2019/3/10
 * Time: 9:29 PM
 */

namespace Application\Web;

use Exception;
use SplFileObject;

class Access
{

    const ERROR_UNABLE = 'ERROR: unable to open file';

    protected $log;
    public $frequency = [];

    /**
     * Access constructor.
     * @param $filename
     * @throws Exception
     */
    public function __construct($filename)
    {
        if (!file_exists($filename)) {
            $message = __METHOD__ . ' : ' . self::ERROR_UNABLE . PHP_EOL;
            $message .= strip_tags($filename) . PHP_EOL;
            throw  new Exception($message);
        }
        $this->log = new SplFileObject($filename, 'r');
    }

    /**
     * 逐行迭代日志文件
     * @return \Generator|int
     */
    public function fileIteratorbyLine()
    {
        $count = 0;
        while (!$this->log->eof()) {
            yield $this->log->fgets();
            $count++;
        }
        return $count;
    }

    /**
     * 提取IP地址
     * @param $line
     * @return string
     */
    public function getIp($line)
    {
        preg_match('/(\d{1,3}\.\d{1,3}\.\d{1,3}\d{1,3})/', $line, $match);
        return $match[1] ?? '';
    }
}