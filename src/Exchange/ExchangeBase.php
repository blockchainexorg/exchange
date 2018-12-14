<?php

namespace Exchange\Exchange;

use Exchange\Helper;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:30
 */
class ExchangeBase
{
    protected $exchange;
    protected $config;
    protected $error;
    protected $data;
    protected $symbol;

    public function __construct()
    {
        $this->exchange = strtolower(Helper::getClass(get_called_class()));
        $this->config = Helper::config($this->exchange);
    }

    private function getClient()
    {
        $timeout = $this->config['timeout'] ?? 10;
        $client_params = [
            'base_uri' => $this->config['url'],
            'timeout' => $timeout,
        ];
        //@TODO 考虑用环境变量配置 后边看测试情况
        if (!empty($this->config['proxy'])) {
            $client_params['proxy'] = $this->config['proxy'];
        }
        return new Client($client_params);
    }

    protected function request($method = 'GET', $url = '', $params = [], $return_type = 'json')
    {
        try {
            $response = $this->getClient()->request($method, $url, $params);
        } catch (GuzzleException $e) {
            $this->error = '请求失败：' . $e->getMessage();
            return false;
        }
        $data = (string)$response->getBody();
        //@TODO 如果有不是json的再扩展
        $this->data = json_decode($data, true);
        return true;
    }


}