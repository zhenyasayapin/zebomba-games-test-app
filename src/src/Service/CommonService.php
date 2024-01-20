<?php

namespace App\Service;

class CommonService
{

    public function convertArrayKeysCamelToSnake($array)
    {
        $result = [];
        foreach($array as $key => $value)
        {
            $result[$this->convertStringCamelToSnake($key)] = $value;
        }

        return $result;
    } 

    public function convertStringCamelToSnake($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
}