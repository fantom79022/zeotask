<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 14:00
 */
class String
{
    const PATTERN_STRING = '/ string/';
    const REPLACEMENT_STRING = 'text"';


    public function getStringType($token) {
        return preg_replace(self::PATTERN_STRING, self::REPLACEMENT_STRING, $token);
    }

}