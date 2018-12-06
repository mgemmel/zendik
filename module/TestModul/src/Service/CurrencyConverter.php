<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 6.12.2018
 * Time: 9:45
 */

namespace TestModul\Service;


class CurrencyConverter
{
    public function convertEURtoUSD($amount)
    {
        return $amount*1.25;
    }
}