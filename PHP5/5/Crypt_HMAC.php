<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 16:41
 */

class Crypt_HMAC
{
    private $_func;
    private $_ipad;
    private $_opad;

    /**
     * Crypt_HMAC constructor.
     * @param $key
     * @param string $method
     */
    public function __construct($key, $method = 'md5')
    {
        if (!in_array($method, ['sha1', 'md5'])) {
            die('Unsupported hash function '. $method);
        }
        $this->_func = $method;

        //按照PFC的要求填充关键字（步骤1）
        if (strlen($key) > 64) {
            $key = pack('H32', $method($key));
        }

        if (strlen($key) < 64) {
            $key = str_pad($key, 64, chr(0));
        }

        // 计算填充的关键字，并且保存它们
        $this->_ipad = substr($key, 0, 64) ^ str_repeat(chr(0x36), 64);
        $this->_opad = substr($key, 0, 64) ^ str_repeat(chr(0x5c), 64);
    }

    public function hash($data)
    {
        $func = $this->_func;
        $inner = pack('H32', $func($this->_ipad . $data));
        $digest = $func($this->_opad . $inner);
        return $digest;
    }
}