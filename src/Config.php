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
        'pairs' => 'head1',
        'timeout' => 10,
        //'proxy' => []
    ],
    'oex' => [
        'url' => 'https://oex.com/api/v1/',
        'ticker' => 'tickers',
        'timeout' => 90,
//        'proxy' => [
//            'http' => 'http://127.0.0.1:8001',
//            'https' => 'http://127.0.0.1:8001'
//        ]
    ],
    'idcm' => [
        'url' => 'https://api.idcm.io:8323/api/v1/',
        'ticker' => 'RealTimeQuote/GetRealTimeQuotes',
        'pairs' => 'RealTimeQuote/GetRealTimeQuotes',
        'timeout' => 60,
        'proxy' => [
            'http' => 'http://127.0.0.1:8001',
            'https' => 'http://127.0.0.1:8001'
        ]
    ]
];