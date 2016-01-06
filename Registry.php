<?php

class Registry
{
    /**
     *
     * @var array
     */
    protected static $_registry = array();

    /**
     *
     * @param string $key
     * @param mixed $item
     * @return void
     */
    public static function set($key, $item) {
        if (!array_key_exists($key, self::$_registry)) {
            self::$_registry[$key] = $item;
        }
    }

    /**
     *
     * @param string $key
     * @return false|mixed
     */
    public static function get($key) {
        if (array_key_exists($key, self::$_registry)) {
            return self::$_registry[$key];
        }

        return false;
    }

    /**
     *
     * @param string $key
     * @return void
     */
    public static function remove($key) {
        if (array_key_exists($key, self::$_registry)) {
            unset(self::$_registry[$key]);
        }
    }
}