# blockchainexorg/exchange
blockchainexorg/exchange用于集成对接各个主流交易所的开放接口

## Ticker
获取ticker数据
```
use Exchange\Exchange;

$obj = new Exchange();
$ticker = $obj->setExchange('coinsbank')
    ->setSymbol('BTC_USD')
    ->getTicker();
```
返回数据：
```
{
  ["open"]=>
  float(3267.05)
  ["high"]=>
  float(3430.37)
  ["low"]=>
  float(3238.17)
  ["close"]=>
  float(3266.86)
  ["amount"]=>
  float(4501.7421)
  ["vol"]=>
  float(14697066.01387)
  ["count"]=>
  int(0)
  ["exchange"]=>
  string(9) "coinsbank"
  ["symbol"]=>
  string(7) "BTC_USD"
}

```
