<?php

namespace Exchange\Exchange;

use Exchange\Exchange;
use Exchange\Helper;

/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:34
 */
class Coinsbank extends ExchangeBase implements ExchangeInterface
{
    public function getTicker(Exchange $exchange)
    {
        $this->symbol = str_replace('_', '', $exchange->getSymbol());
        $url = sprintf($this->config['ticker'], $this->symbol);
        $ret = $this->request('GET', $url);
        if ($ret === false) {
            return Helper::fail($this->error);
        }
        if (!$this->handleError()) {
            return Helper::fail($this->error);
        }
        return $this->convertTicker();
    }

    public function getTrade()
    {

    }

    public function getDepth()
    {

    }

    public function getKline()
    {

    }

    private function convertTicker()
    {
        $data = current($this->data);

        $ticker = new Ticker();
        $ticker->open = $data['o'];
        $ticker->high = $data['h'];
        $ticker->low = $data['l'];
        $ticker->close = $data['c'];
        $ticker->amount = $data['v'];
        $ticker->vol = $data['vq'];

        return Helper::toArray($ticker);
    }

    private function handleError()
    {
        if (!empty($this->data['code'])) {
            $this->error = '请求失败，返回结果：' . json_encode($this->data);
            return false;
        }
        return true;
    }
}