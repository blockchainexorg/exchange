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
class Oex extends ExchangeBase implements ExchangeInterface
{
    public function getTicker(Exchange $exchange)
    {
        $url = $this->config['ticker'];
        $ret = $this->request('GET', $url);

        if ($ret === false) {
            return Helper::fail($this->error);
        }
        if (!$this->handleError()) {
            return Helper::fail($this->error);
        }
        if(empty($this->data['data'])) {
            return [];
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

    public function getPairs() {

    }

    private function convertTicker()
    {
        $ticker_data = [];
        foreach ($this->data['data'] as $datum) {
            $_symbol = strtoupper($datum['name']);
            $symbol = explode('_', $_symbol);
            $ticker = new Ticker();
            $ticker->digital_currency = $symbol[0];
            $ticker->market_currency = $symbol[1];
            $ticker->open = $datum['buy'] ?? $datum['latest'];
            $ticker->high = $datum['high'] ?? $datum['latest'];
            $ticker->low = $datum['low'] ?? $datum['latest'];
            $ticker->close = $datum['latest'];
            $ticker->amount = $datum['24h_vol'];
            //$ticker->vol = $datum['vq'];

            $ticker_data[$_symbol] = Helper::toArray($ticker);
        }

        return $ticker_data;
    }

    private function handleError()
    {
        return true;
    }
}