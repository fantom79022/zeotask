<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 14:00
 */
class Int
{
    const PATTERN_INT = '/ int/';
    const REPLACEMENT_INT = 'number"';


    public function getIntType($token) {
        return preg_replace(self::PATTERN_INT, self::REPLACEMENT_INT, $token);
    }

}