<?php
class Person
{
    /**
     * @var string
     * @required
     * @length(50)
     * @text('label' => 'Full Name')
     */
    public $name;

    /**
     * @var string
     * @length(50)
     * @text('label' => 'Street Address')
     */
    public $address;

    /**
     * @var int
     * @range(0, 100)
     */
    public $age;

    /**
     * @var string
     * @length(20)
     * @text('label' => 'Your phone')
     */
    public $phone;
}