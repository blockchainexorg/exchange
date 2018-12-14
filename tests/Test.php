<?php
/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午3:15
 */
require_once '../vendor/autoload.php';
use Exchange\Helper;
use Exchange\Exchange;

//$config = Helper::config('coinsbank.url');
//var_dump($config);

$obj = new Exchange();
$ret = $obj->setExchange('coinsbank')
    ->setSymbol('BTC_USD')
    ->getTicker();
var_dump($ret);