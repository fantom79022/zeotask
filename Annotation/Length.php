<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 14:34
 */
class Length
{
    const PATTERN_LENGTH = '/(length)[(](\d++)\)/';
    const REPLACEMENT_LENGTH = 'maxlength="$2"';

    public function getLength($token) {
        return preg_replace(self::PATTERN_LENGTH, self::REPLACEMENT_LENGTH, $token);
    }
}