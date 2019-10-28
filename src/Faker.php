<?php

/**
 * Ybazli/Faker package
 * @ybazli
 */

namespace Ybazli\Faker;

class Faker
{

    public function __construct()
    {
        //include librrary array
        $this->objects = require __DIR__ . '/libs/tr.php';

        // custom helper include
        $this->object = require 'helper.php';
    }

    /**
     * return random data in object
     * $object is a name of index of librrary
     * @author Ybazli
     */
    protected  function getRandomKey($object = null)
    {
        $name  = 0;
        $array = [];

        if (is_array($object)) {
            $array = $object;
            $name  = array_rand($object);
        } elseif (is_string($object)) {
            $array = $this->objects[$object];
            $name  = array_rand($array);
        }
        if (is_array($array[$name])) {
            return $array[$name];
        }
        return string($array[$name]);
    }

    /**
     * return a random first name
     */
    public function firstName()
    {
        return $this->getRandomKey('firstName');
    }

    /**
     * return a random last name
     */
    public function lastName()
    {
        return $this->getRandomKey('lastName');
    }


    /**
     * Generate fake email with  6-8 random length string
     * [gmail, yahoo ,msn ,hotmail ] Domains
     *
     * @param [integer] $count nullable
     * @return string
     */
    public function email($characterCount = 8)
    {
        $email = string_random($characterCount);
        return "{$email}@{$this->getRandomKey('email')}";
    }

    /**
     * return a random of job title
     */
    public function jobTitle()
    {
        return $this->getRandomKey('jobTitle');
    }

    /**
     * return a random word
     */
    public function word()
    {
        return $this->getRandomKey('word');
    }

    /**
     * return a random sentence
     */
    public function sentence()
    {
        return $this->getRandomKey('sentence') . '.';
    }

    /**
     * return a random paragraph
     */
    public function paragraph()
    {
        return $this->getRandomKey('paragraph') . '.';
    }

    /**
     * return a random mobile phone number
     * return random 10 legnth number with iranian mobile mobile code like : 0912 , ...
     */
    public function mobile()
    {
        $prefix = $this->getRandomKey('mobile');
        $phone =  string($prefix . randomNumber(7));
        return (strlen($phone) !== 10 ? $phone . rand(1, 10) : $phone);
    }

    /**
     * return a random tellphone number
     */
    public function telephone()
    {
        $prefix = $this->getRandomKey('tellphone');
        return string('0' . $prefix . randomNumber(7));
    }

    /**
     * Generate a city with ilce and and postcode
     * 
     * @return Array 
     */
    public function city()
    {
        $city = $this->getRandomKey('city');
        $sehir['sehir'] = $city['il'];
        $maxIndex = count($city['ilceleri']) - 1;
        $sehir['ilce'] = $city['ilceleri'][rand(0, $maxIndex)];
        return $sehir;
    }

    /**
     * return a random domain address .
     * $length is length of domain name
     * if not set parametr to method auto return random between 5-8 length string
     * tlds are like com , net , ir , co , co.ir , ...
     * random web protocol http & https
     */
    public function domain($length = null)
    {
        if (!is_null($length)) {
            $domainName = strtolower(str_random($length));
        } else {
            $domainName = strtolower(str_random(rand(5, 8)));
        }
        $domain = $this->getRandomKey('protocol') . '://' . 'www.' . $domainName . '.' . $this->getRandomKey('domain');
        return $domain;
    }

    /**
     * return 10 length random number
     */
    public function identify()
    {
        $prefix = 99;
        return $prefix . randomNumber(9);
    }

    /**
     * return a random birthday date
     * year strating from 1950 - 2002
     * $sign to sign between year mouth year
     * default sign is '-'
     * @return string year-mouth-day
     */
    public function birthday($sign = null)
    {
        $year  = rand(1950, 2002);
        $mouth = rand(1, 12);
        $day   = rand(1, 30);

        $sign = is_null($sign) ? '-' : $sign;

        return $year . $sign . $mouth . $sign . $day;
    }

    /**
     * return a random first name and last name together
     */
    public function fullName()
    {
        $firstName = $this->getRandomKey('firstName');
        $lastName = $this->getRandomKey('lastName');

        return "{$firstName} {$lastName}";
    }

    /**
     * return random age 
     * you can use $min for minimum start age and max for maximum age
     * if $min and $max is null return random age between 18-50 years;
     */
    public function age($min = null, $max = null)
    {
        if (!is_null($min) && !is_null($min)) {
            $age = rand($min, $max);
        } else {
            $age = rand(18, 50);
        }
        return $age;
    }

    /**
     * return random address
     */
    public function address()
    {
        $name =  $this->getRandomKey('firstName');
        $number = rand(1, 40);
        $kat = rand(1, 5);
        return "{$name} Apt. {$number}/{$kat}";
    }

    public function toString(array $array)
    {
        if (is_array($array)) {
            $string =  implode(' ', $array);
            return $string;
        } else {
            return;
        }
    }
}
