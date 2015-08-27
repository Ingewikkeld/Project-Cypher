<?php

namespace App\People;

use PDO;
use RuntimeException;

final class PersonRepository
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param PersonId $id
     * @return Person|null
     */
    public function find(PersonId $id)
    {
        $sql = <<< EOQ
SELECT *
FROM people p
LEFT JOIN people_data d ON (d.person_id = p.id)
WHERE p.id = :id
EOQ;

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id->toString());
        $stmt->execute();

        $name = null;
        $data = [];

        while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            if ($name === null) {
                $name = $row['name'];
            }

            $dataType = DataType::fromString($row['type']);

            $data[] = new Data($dataType, $row['label'], $row['value']);
        }

        if (!$data) {
            return null;
        }

        return new Person($id, $name, $data);
    }

    /**
     * @param Person $person
     */
    public function add(Person $person)
    {
        $sql = <<< EOQ
INSERT INTO people (id, name) VALUES (:id, :name)
EOQ;

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $person->getId()->toString());
        $stmt->bindValue('name', $person->getName());

        if ($stmt->execute() === false) {
            throw new RuntimeException('Unable to execute insert query');
        }

        $this->addData($person);
    }

    /**
     * @param Person $person
     */
    public function update(Person $person)
    {
        $sql = <<< EOQ
UPDATE people SET name = :name WHERE id = :id
EOQ;

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('name', $person->getName());
        $stmt->bindValue('id', $person->getId()->toString());

        if ($stmt->execute() === false) {
            throw new RuntimeException('Unable to execute insert query');
        }

        $sql = <<< EOQ
DELETE FROM people_data WHERE person_id = :id
EOQ;

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $person->getId()->toString());

        if ($stmt->execute() === false) {
            throw new RuntimeException('Unable to execute insert query');
        }

        $this->addData($person);
    }

    /**
     * @param Person $person
     */
    private function addData(Person $person)
    {
        foreach ($person->getData() as $data) {
            $sql = <<< EOQ
INSERT INTO people_data (person_id, type, label, value) VALUES (:id, :type, :label, :value)
EOQ;

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue('id', $person->getId()->toString());
            $stmt->bindValue('type', $data->getType()->toString());
            $stmt->bindValue('label', $data->getLabel());
            $stmt->bindValue('value', $data->getValue());

            if ($stmt->execute() === false) {
                throw new RuntimeException('Unable to execute insert query');
            }
        }
    }

    /**
     * @return array a collection of peoples
     */
    public function findAll()
    {
        $sql = <<< EOQ
SELECT *
FROM people p
EOQ;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $peoples = [];

        while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $person = new Person(PersonId::fromString($row['id']), $row['name']);
            array_push($peoples, $person);
        }

        return $peoples;
    }
}
