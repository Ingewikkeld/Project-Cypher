<?php

namespace App\People;

use InvalidArgumentException;
use JsonSerializable;

final class Person implements JsonSerializable
{
    /**
     * @var PersonId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Data[]
     */
    private $data;

    /**
     * @param PersonId $id
     * @param string   $name
     * @param Data[]   $data
     */
    public function __construct(PersonId $id, $name, array $data = [])
    {
        foreach ($data as $entry) {
            if (!$entry instanceof Data) {
                throw new InvalidArgumentException(
                    sprintf('Invalid data entry, must be an instance of %s', Data::class)
                );
            }
        }

        $this->id   = $id;
        $this->name = (string) $name;
        $this->data = $data;
    }

    /**
     * @return PersonId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function rename($name)
    {
        $this->name = (string) $name;
    }

    /**
     * @return Data[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Data $data
     */
    public function addData(Data $data)
    {
        $this->data[] = $data;
    }

    /**
     * @param Data $data
     */
    public function removeData(Data $data)
    {
        foreach ($this->data as $index => $dataEntry) {
            if ($dataEntry === $data) {
                unset($this->data[$index]);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return [
            'id'   => $this->id->toString(),
            'name' => $this->name,
            'data' => $this->data
        ];
    }
}
