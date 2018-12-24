<?php
/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/24
 * Time: 上午11:01
 */
require_once '../vendor/autoload.php';
use Exchange\Helper;
use Exchange\Exchange;

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



var_dump($ret);