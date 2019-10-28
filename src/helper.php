<?php


// string helper	
if (!function_exists('string')) {
    function string($value)
    {
        return (string) $value;
    }
}
//get rand int
if (!function_exists('randomNumber')) {
    function randomNumber($length = 20, $int = false)
    {
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $int ? (int) $result : (string) $result;
    }
}

if (!function_exists('dd')) {
    function dd($item)
    {
        dump($item);
        die;
    }
}


if (!function_exists('string_random')) {
    function string_random($length = 10)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
