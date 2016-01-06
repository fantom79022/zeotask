<?php
class Person
{
    /**
     * @var string
     * @required
     * @length(50)
     * @text('label' => 'Full Name')
     */
    protected static $name;

    /**
     * @var string
     * @length(50)
     * @text('label' => 'Street Address')
     */
    protected static $address;

    /**
     * @var int
     * @range(0, 100)
     */
    protected static $age;

    /**
     * @var string
     * @length(20)
     * @text('label' => 'Your phone')
     */
    protected static $phone;

    /**
     * @param string $value
     */
    public static function setName($value)
    {
        self::$name = $value;
    }

    /**
     * @return null|string
     */
    public static function getName()
    {
        return isset(self::$name) ? self::$name : null;
    }

    /**
     * @param string $value
     */
    public static function setAddress($value)
    {
        self::$address = $value;
    }

    /**
     * @return null|string
     */
    public static function getAddress()
    {
        return isset(self::$address) ? self::$address : null;
    }

    /**
     * @param int $value
     */
    public static function setAge($value)
    {
        self::$age = $value;
    }

    /**
     * @return int|null
     */
    public static function getAge()
    {
        return isset(self::$age) ? self::$age : null;
    }

    /**
     * @param string $value
     */
    public static function setPhone($value)
    {
        self::$phone = $value;
    }

    /**
     * @return null|string
     */
    public static function getPhone()
    {
        return isset($phone) ? self::$phone : null;
    }

}