<?php
/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/24
 * Time: 上午11:01
 */
require_once '../vendor/autoload.php';
use ExchangeCenter\Helper;
use ExchangeCenter\Exchange;

try {
    $obj = new Exchange();
    $obj->setExchange($argv[1]);

    switch ($argv[1]) {
        case 'idcm':
            $config = [
                'apikey' => 'xxx',
                'secret' => 'xxx'
            ];
            $obj->setOptions($config);
            break;
        default:
            break;

    }

    $ret = $obj->getTicker();

} catch (Exception $e) {
    var_dump($e->getMessage());
    die();
}

var_dump(json_encode($ret));