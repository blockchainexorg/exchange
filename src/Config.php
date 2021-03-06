<?php
/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:25
 */

return [
    'coinsbank' => [
        'url' => 'https://coinsbank.com/sapi/',
        'ticker' => 'trade/ohlcv?pairCode=%s&interval=86400',
        'pairs' => 'head',
        'timeout' => 60,
    ],
    'oex' => [
        'url' => 'https://oex.com/api/v1/',
        'ticker' => 'tickers',
        'timeout' => 90,
    ],
    'idcm' => [
        'url' => 'https://api.idcm.io:8323/api/v1/',
        'ticker' => 'RealTimeQuote/GetRealTimeQuotes',
        'pairs' => 'RealTimeQuote/GetRealTimeQuotes',
        'timeout' => 60,
    ],
    'fatbtc' => [
        'url' => 'https://www.fatbtc.us/m/',
        'ticker' => 'allticker/1/',
        'pairs' => '',
        'timeout' => 60,
    ],
    'topbtc' => [
        'url' => 'http://www.topbtc.one/market/',
        'ticker' => 'tickerall.php',
        'pairs' => '',
        'timeout' => 60,
    ],
    'coinsuper' => [
        'url' => 'https://www.coinsuper.com/v1/api/market/',
        'ticker' => 'hour24Market',
        'pairs' => '',
        'timeout' => 60,
    ],
    'mountaintoken' => [
        'url' => 'https://www.mountaintoken.co/api/v2/',
        'ticker' => 'tickers',
        'pairs' => '',
        'timeout' => 60,
    ],
    'singbitx' => [
        'url' => 'https://manager.singbitx.io/api/v2/',
        'ticker' => 'tickers',
        'pairs' => '',
        'timeout' => 60,
    ],
    'hotbit' => [
        'url' => 'https://api.hotbit.io/api/v1/',
        'ticker' => 'allticker',
        'pairs' => '',
        'timeout' => 60,
    ],
    'cointiger' => [
        'url' => '',
        'ticker' => 'https://www.cointiger.com/exchange/api/public/market/detail',
        'pairs' => 'https://api.cointiger.com/exchange/trading/api/v2/currencys',
        'timeout' => 60,
    ],
];