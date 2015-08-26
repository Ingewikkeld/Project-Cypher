<?php

namespace App\People;

use JsonSerializable;

final class Data implements JsonSerializable
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

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return [
            'type'  => $this->type->toString(),
            'label' => $this->label,
            'value' => (string) $this->value
        ];
    }
}
