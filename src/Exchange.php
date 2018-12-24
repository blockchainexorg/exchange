<?php

namespace Exchange;


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
        $this->exchange = $exchange;
        $this->class = $this->getClass();
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

    public function setOptions(array $options) {
        $this->options = $options;
        return $this;
    }

    public function getOptions() {
        return $this->options;
    }

    private function getClass()
    {
        $exchange = ucfirst($this->exchange);
        $class = '\Exchange\Exchange\\' . $exchange;
        $class = new $class();
        return $class;
    }

    public function getTicker()
    {
        $ret = $this->class->getTicker($this);
        return $ret;
    }

}