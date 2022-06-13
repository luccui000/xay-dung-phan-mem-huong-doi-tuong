<?php

namespace Luccui\Core;

class Str
{
    public static function random($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function makeReadMore($string, $limit = 100)
    {
        $string = strip_tags($string);
        if (strlen($string) > $limit) {
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
}
