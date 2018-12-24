<?php
namespace Exchange\Exchange;
use Exchange\Exchange;

/**
 * Created by PhpStorm.
 * User: tiger
 * Date: 2018/12/14
 * Time: 下午2:31
 */
interface ExchangeInterface
{
    public function getTicker(Exchange $exchange);

    public function getTrade();

    public function getDepth();

    public function getKline();

    public function getPairs();
}