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
     * @var string;
     */
    private $canonical;

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
            $data['name'],
            $data['canonical']
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
        $this->data = [];
        $this->tags = [];

        $this->rename($name);
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

    /**
     * @param string $name
     */
    public function rename($name)
    {
        $this->name      = (string) $name;
        $this->canonical = preg_replace('/[^0-9a-z]/', '', strtolower($name));
    }

    /**
     * @return string
     */
    public function getCanonical()
    {
        return $this->canonical;
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
        // YES! This is horrible, sorry, just needed a very quick fix!

        $canonical = $this->canonical;
        $filename  = sprintf('%s/images/%s.jpg', public_path(), $canonical);

        if (!file_exists($filename)) {
            $canonical = 'blank';
        }

        return [
            'id'        => $this->id->toString(),
            'name'      => $this->name,
            'canonical' => $canonical,
            'data'      => $this->data,
            'tags'      => $this->tags
        ];
    }
}
