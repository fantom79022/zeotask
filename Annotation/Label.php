<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 15:45
 */
class Label
{
    const PATTERN_LABEL = '/(text)[(]\'(label)\' => \'(.+)\'\)/';

    public function getLabel($token) {
        preg_match(self::PATTERN_LABEL, $token, $matches);
        if ($matches) {
            return $matches[3];
        } else {
            return null;
        }
    }
}