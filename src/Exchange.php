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
        $class = '\ExchangeCenter\Exchange\\' . $exchange;
        if (!class_exists($class)) {
            Helper::fail('暂不支持该交易所');
        }
        $this->class = new $class;
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

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    public function getParams()
    {
        return $this->params;
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
        $ret = $this->class->getTicker($this);
        return $ret;
    }

}