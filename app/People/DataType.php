<?php

namespace App\People;

use InvalidArgumentException;

final class DataType
{
    const CUSTOM   = 'custom';
    const FACEBOOK = 'facebook';

    /**
     * @var string
     */
    private $type;

    /**
     * @return DataType
     */
    public static function CUSTOM()
    {
        return new self(self::CUSTOM);
    }

    /**
     * @return DataType
     */
    public static function FACEBOOK()
    {
        return new self(self::FACEBOOK);
    }

    /**
     * @param string $string
     * @return DataType
     */
    public static function fromString($string)
    {
        return new self($string);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->type;
    }

    /**
     * @param mixed $other
     * @return bool
     */
    public function equals($other)
    {
        return ($other instanceof self && $other->type === $this->type);
    }

    /**
     * @param string $type
     */
    private function __construct($type)
    {
        if (!in_array($type, [self::CUSTOM, self::FACEBOOK], true)) {
            throw new InvalidArgumentException(sprintf('Invalid data type "%s"', $type));
        }

        $this->type = $type;
    }
}
