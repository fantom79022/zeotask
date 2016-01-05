<?php

/**
 * Created by PhpStorm.
 * User: fantik
 * Date: 05.01.16
 * Time: 14:58
 */
class Prepare
{
    const CLEAN_ASTERISK = '[\*]';
    const CLEAN_SLASH = '[/]';
    const CLEAN_AT_SIGN = '[\@]';
    const CLEAN_LABEL = '/(text)[(]\'(label)\' => \'(.+)\'\)/';
    const PATTERN_VAR = '/var/';
    const REPLACEMENT_VAR = 'type="';

    public function prepareToken($token) {
        $toReplace = array(self::CLEAN_ASTERISK, self::CLEAN_AT_SIGN, self::CLEAN_SLASH, self::CLEAN_LABEL, self::PATTERN_VAR, );
        $replacer = array('', '', '', '', self::REPLACEMENT_VAR);

        return preg_replace($toReplace, $replacer, $token);


    }
}