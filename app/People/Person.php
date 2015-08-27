<?php

namespace App\People;

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
     * @var Tag[]
     */
    private $tags;

    /**
     * @param array $data
     * @return Person
     */
    public static function fromDB(array $data)
    {
        $person = new Person(
            PersonId::fromString($data['id']),
            $data['name']
        );

        foreach ($data['data'] as $entry) {
            $person->data[] = new Data(
                DataId::fromString($entry['id']),
                DataType::fromString($entry['type']),
                $entry['label'],
                $entry['value']
            );
        }

        foreach ($data['tags'] as $entry) {
            $person->tags[] = Tag::fromString($entry['tag']);
        }

        return $person;
    }

    /**
     * @param PersonId $id
     * @param string   $name
     */
    public function __construct(PersonId $id, $name)
    {
        $this->id   = $id;
        $this->name = (string) $name;
        $this->data = [];
        $this->tags = [];
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
     * @param DataType $type
     * @param string   $label
     * @param string   $value
     */
    public function addData(DataType $type, $label, $value)
    {
        $this->data[] = new Data(DataId::generate(), $type, $label, $value);
    }

    /**
     * @param DataType $type
     * @param string   $label
     * @param string   $value
     */
    public function removeData(DataType $type, $label, $value)
    {
        foreach ($this->data as $index => $entry) {
            if ($entry->getType()->equals($type) && $entry->getLabel() === $label && $entry->getValue() === $value) {
                unset($this->data[$index]);
            }
        }
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tag
     */
    public function addTag($tag)
    {
        $this->tags[] = Tag::fromString($tag);
    }

    /**
     * @param string $tag
     */
    public function removeTag($tag)
    {
        foreach ($this->tags as $index => $entry) {
            if ($entry->toString() === $tag) {
                unset($this->tags[$index]);
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
