<?php

namespace App\People;

final class Data
{
    /**
     * @var DataType
     */
    private $type;

    /**
     * @var string
     */
    private $label;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param DataType $type
     * @param string   $label
     * @param mixed    $value
     */
    public function __construct(DataType $type, $label, $value)
    {
        $this->type  = $type;
        $this->label = (string) $label;
        $this->value = $value;
    }

    /**
     * @return DataType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
