<?php

namespace ExchangeCenter\Exchange;

use ExchangeCenter\Exchange;
use ExchangeCenter\Helper;
use ExchangeCenter\Exchange\Models\Ticker;

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
        $pairs = $this->getPairs();
        if (empty($pairs)) return [];

        $promises = [];
        foreach ($pairs as $pair) {
            $promises[] = [
                'index' => $pair[0] . '_' . $pair[1],
                'url' => $this->config['url'] . sprintf($this->config['ticker'], $pair[0] . $pair[1]),
            ];
        }

        $ret = $this->multiRequest($promises);
        if ($ret === false) {
            Helper::fail($this->error);
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

    public function getPairs()
    {
        $this->request('GET', $this->config['pairs']);
        if (empty($this->data)) {
            Helper::fail('获取交易对失败');
        }
        $this->handleError();
        return $this->convertPairs();
    }

    private function convertTicker()
    {
        $tickers = [];
        if(!empty($this->data)) {
            foreach ($this->data as $pair => $datum) {
                $data = current($datum);
                $symbol = explode('_', $pair);
                $ticker = new Ticker();
                $ticker->digital_currency = $symbol[0];
                $ticker->market_currency = $symbol[1];
                $ticker->open = $data['o'];
                $ticker->high = $data['h'];
                $ticker->low = $data['l'];
                $ticker->close = $data['c'];
                $ticker->amount = $data['v'];
                $ticker->vol = $data['vq'];
                $ticker->timestamp = floor($data['date'] / 1000);
                $tickers[$pair] = Helper::toArray($ticker);
            }
        }
        return $tickers;
    }

    private function convertPairs()
    {
        $pairs_data = [];
        if (!empty($this->data['pairs'])) {
            foreach ($this->data['pairs'] as $pair) {
                $pairs_data[] = [
                    $pair['base_code'],
                    $pair['quote_code'],
                ];
            }
        }
        return $pairs_data;
    }

    private function handleError()
    {
        if (!empty($this->data['code'])) {
            Helper::fail('请求失败，返回结果：' . json_encode($this->data));
        }
        return true;
    }
}