# blockchainexorg/exchange
blockchainexorg/exchange用于集成对接各个主流交易所的开放接口

## Ticker
获取ticker数据

支持平台及平台文档地址：

```
1、coinsbank：https://coinsbank.com/sapi/trade/ohlcv?pairCode=BTCUSD&interval=86400
2、oex：https://oex.com/api/v1/tickers
```

调用示例：
```
use Exchange\Exchange;

try {
    $obj = new Exchange();
    $ticker = $obj->setExchange('coinsbank')   
        ->setOptions([
            'apikey' => 'xxx',//idcm需要
            'secret' => 'xxx',//idcm需要
        ])
        ->getTicker();
} catch(Exception $e) {
    var_dump($e->getMessage());
}
```
方法解释：
```
setExchange() 设置平台
setOptions()  设置选项信息
```
返回数据：
```
{
  ["BTC_USD"]=>
  array(9) {
    ["digital_currency"]=>
    string(3) "BTC"
    ["market_currency"]=>
    string(3) "USD"
    ["open"]=>
    float(3498.61)
    ["high"]=>
    float(3529.69)
    ["low"]=>
    float(3482.86)
    ["close"]=>
    float(3490.71)
    ["amount"]=>
    float(105.5718)
    ["vol"]=>
    float(370160.870076)
    ["count"]=>
    int(0)
    ["timestamp"]=>
    int(1545609600)
  }
}

```
