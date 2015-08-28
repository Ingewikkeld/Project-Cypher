<?php

namespace App\People;
use JsonSerializable;

final class Tag implements JsonSerializable
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

    /**
     * @inheritdoc
     */
    function jsonSerialize()
    {
        return $this->tag;
    }


}
