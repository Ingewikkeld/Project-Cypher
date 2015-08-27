<?php

namespace App\People;

final class Tag
{
    /**
     * @var string
     */
    private $tag;

    /**
     * @param $string
     * @return Tag
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
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    private function __construct($tag)
    {
        $this->tag = (string) $tag;
    }
}
