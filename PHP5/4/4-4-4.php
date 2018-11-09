<?php
/**
 * Created by PhpStorm.
 * User: 85377
 * Date: 2018/11/9
 * Time: 14:47
 */

interface Observer
{
    function notify($obj);
}

class ExchangeRate
{
    private static $instance = null;
    private $observers = [];
    private $exchange_rate;

    private function exchangeRate()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ExchangeRate();
        }
        return self::$instance;
    }

    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }

    public function setExchangeRate($newRate)
    {
        $this->exchange_rate = $newRate;
        $this->notifyObservers();
    }

    public function registerObserver($obj)
    {
        $this->observers[] = $obj;
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }
}

class ProductItem implements Observer
{
    public function __construct()
    {
        ExchangeRate::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
        if ($obj instanceof ExchangeRate) {
            // 更新交易率数据
            echo 'Received update!', PHP_EOL;
        }
    }
}

$product1 = new ProductItem();
$product2 = new ProductItem();

ExchangeRate::getInstance()->setExchangeRate(4.5);