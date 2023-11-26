<?php

namespace App\Helpers;

class ConvertNumber
{
    public static function ToFarsi($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];


        $num = range(0, 9);
        return str_replace($num, $persian, $string);
    }
}