<?php

namespace ExchangeCenter;


/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:25
 */

class Exchange
{
    private $exchange = null;
    private $symbol = null;
    private $class = null;
    private $params = [];
    private $options = [];

    public function setExchange($exchange)
    {
        $exchange = ucfirst($exchange);
        $this->exchange = $exchange;
        return $this;
    }

    public function getExchange()
    {
        return $this->exchange;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getTicker()
    {
        $class = '\ExchangeCenter\Exchanges\\' . $this->exchange . '\Ticker';
        if (!class_exists($class)) {
            Helper::fail('暂不支持该交易所获取Ticker');
        }
        $this->class = new $class();
        $ret = $this->class->getData($this->options);
        return $ret;
    }

}