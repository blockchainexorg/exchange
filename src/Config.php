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
        'timeout' => 10,
        //'proxy' => []
    ]
];