<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 14:00
 */
class Range
{
    const PATTERN_RANGE = '/(range)[(](\d+), (\d+)[)]/';
    const REPLACEMENT_RANGE = 'min="$2" max="$3"';

    public function getRange($token) {
        return preg_replace(self::PATTERN_RANGE, self::REPLACEMENT_RANGE, $token);
    }

}