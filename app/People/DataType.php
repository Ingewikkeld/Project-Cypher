<?php

namespace App\People;

use InvalidArgumentException;

final class DataType
{
    const CUSTOM   = 'custom';
    const FACEBOOK = 'facebook';
    const URL = 'url';
    const DATE = 'date';
    const EMAIL = 'email';

    /**
     * @var string
     */
    private $type;

    /**
     * @return DataType
     */
    public static function EMAIL()
    {
        return new self(self::EMAIL);
    }

    /**
     * @return DataType
     */
    public static function URL()
    {
        return new self(self::URL);
    }

    /**
     * @return DataType
     */
    public static function DATE()
    {
        return new self(self::DATE);
    }

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
     * @param string $type
     */
    private function __construct($type)
    {
        if (!in_array($type, [self::CUSTOM, self::FACEBOOK, self::EMAIL, self::URL, self::DATE], true)) {
            throw new InvalidArgumentException(sprintf('Invalid data type "%s"', $type));
        }

        $this->type = $type;
    }
}
