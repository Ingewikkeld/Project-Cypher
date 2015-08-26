<?php

namespace App\Shared;

abstract class Uuid
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @param string $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static($string);
    }

    /**
     * @return static
     */
    public static function generate()
    {
        return new static(\Rhumsaa\Uuid\Uuid::uuid4());
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param string $id
     */
    protected function __construct($id)
    {
        $this->id = (string) $id;
    }
}
