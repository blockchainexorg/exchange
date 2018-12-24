<?php

namespace Exchange\Exchange;

use Exchange\Exchange;
use Exchange\Helper;
use Exchange\Exchange\Models\Ticker;

/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:34
 */
class Idcm extends ExchangeBase implements ExchangeInterface
{
    public function getTicker(Exchange $exchange)
    {
        $url = $this->config['ticker'];
        $this->request('GET', $url);
        if(empty($this->data['Data'])) {
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
        foreach ($this->data['Data'] as $datum) {
            $symbol = explode('/', $datum['TradePairCode']);
            $ticker = new Ticker();
            $ticker->digital_currency = $symbol[0];
            $ticker->market_currency = $symbol[1];
            $ticker->open = $datum['Open'];
            $ticker->high = $datum['High'];
            $ticker->low = $datum['Low'];
            $ticker->close = $datum['Close'];
            $ticker->amount = $datum['Volume'];
            $ticker->vol = $datum['Turnover'];
            $ticker_data[$symbol[0].'_'.$symbol[1]] = Helper::toArray($ticker);
        }
        return $ticker_data;
    }

    private function handleError()
    {
        return true;
    }

//    private function getSign($secret)
//    {
//        $uri = $this->config['url'] . $this->config['ticker'];
//        $str = hash_hmac("sha384", $uri, $secret);
//        return $this->base64UrlEncode($str);
//    }
//
//    private function base64UrlEncode($str)
//    {
//        $find = array('+', '/');
//        $replace = array('-', '_');
//        return str_replace($find, $replace, base64_encode($str));
//    }
}