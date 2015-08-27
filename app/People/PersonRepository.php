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
        $result = $this->query(
            'SELECT * FROM people WHERE id = :id',
            ['id' => $id->toString()]
        );

        if (!$result) {
            return null;
        }

        $data = $result[0];

        $data['data'] = $this->query(
            'SELECT * FROM people_data WHERE person_id = :id',
            ['id' => $id->toString()]
        );

        $data['tags'] = $this->query(
            'SELECT * FROM tags WHERE person_id = :id',
            ['id' => $id->toString()]
        );

        return Person::fromDB($data);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return array_map(
            function (array $row) {
                $row['data'] = [];
                $row['tags'] = [];

                return Person::fromDB($row);
            },
            $this->query('SELECT * FROM people ORDER BY name', [])
        );
    }

    /**
     * @param Person $person
     */
    public function add(Person $person)
    {
        $this->updateQuery(
            'INSERT INTO people (id, name, canonical) VALUES (:id, :name, :canonical)',
            ['id' => $person->getId()->toString(), 'name' => $person->getName(), 'canonical' => $person->getCanonical()]
        );

        foreach ($person->getData() as $data) {
            $this->updateQuery(
                'INSERT INTO people_data (id, person_id, type, label, value) VALUES (:id, :personId, :type, :label, :value)',
                [
                    'id'       => $data->getId()->toString(),
                    'personId' => $person->getId()->toString(),
                    'type'     => $data->getType()->toString(),
                    'label'    => $data->getLabel(),
                    'value'    => $data->getValue()
                ]
            );
        }

        foreach ($person->getTags() as $tag) {
            $this->updateQuery(
                'INSERT INTO tags (person_id, tag) VALUES (:personId, :tag)',
                ['personId' => $person->getId()->toString(), 'tag' => $tag->toString()]
            );
        }
    }

    /**
     * This won't remve any data rows or tag rows.
     *
     * @param Person $person
     */
    public function update(Person $person)
    {
        // person itself
        $this->updateQuery(
            'UPDATE people SET name = :name, canonical = :canonical WHERE id = :id',
            ['name' => $person->getName(), 'canonical' => $person->getCanonical(), 'id' => $person->getId()->toString()]
        );

        // data
        $existingDataIds = array_map(
            function (array $row) {
                return $row['id'];
            },
            $this->query(
                'SELECT id FROM people_data WHERE person_id = :personId',
                ['personId' => $person->getId()->toString()]
            )
        );

        foreach ($person->getData() as $data) {
            if (in_array($data->getId()->toString(), $existingDataIds, true)) {
                $this->updateQuery(
                    'UPDATE people_data SET type = :type, label = :label, value = :value WHERE id = :id',
                    [
                        'type'  => $data->getType()->toString(),
                        'label' => $data->getLabel(),
                        'value' => $data->getValue(),
                        'id'    => $data->getId()->toString()
                    ]
                );
                continue;
            }

            $this->updateQuery(
                'INSERT INTO people_data (id, person_id, type, label, value) VALUES (:id, :personId, :type, :label, :value)',
                [
                    'id'       => $data->getId()->toString(),
                    'personId' => $person->getId()->toString(),
                    'type'     => $data->getType()->toString(),
                    'label'    => $data->getLabel(),
                    'value'    => $data->getValue()
                ]
            );
        }

        // tags
        $existingTags = array_map(
            function (array $row) {
                return $row['tag'];
            },
            $this->query(
                'SELECT tag FROM tags WHERE person_id = :personId',
                ['personId' => $person->getId()->toString()]
            )
        );

        foreach ($person->getTags() as $tag) {
            if (in_array($tag->toString(), $existingTags, true)) {
                continue;
            }

            $this->updateQuery(
                'INSERT INTO tags (person_id, tag) VALUES (:personId, :tag)',
                ['personId' => $person->getId()->toString(), 'tag' => $tag->toString()]
            );
        }
    }

    /**
     * @param string $sql
     * @param array  $params
     * @return array
     */
    private function query($sql, array $params)
    {
        $stmt = $this->connection->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param string $sql
     * @param array  $params
     */
    private function updateQuery($sql, array $params)
    {
        $stmt = $this->connection->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        if ($stmt->execute() === false) {
            throw new RuntimeException('Unable to execute query');
        }
    }

    /**
     * @param string $keyword
     * @return array a collection of people
     */
    public function search($keyword)
    {
        $sql = <<< EOQ
SELECT p.*
FROM people p
LEFT JOIN people_data pd ON(p.id = pd.person_id)
WHERE p.name LIKE :keyword1 OR pd.label LIKE :keyword2 OR pd.value LIKE :keyword3
GROUP BY p.id
ORDER BY p.name
EOQ;

        return array_map(
            function (array $row) {
                $row['data'] = [];
                $row['tags'] = [];

                return Person::fromDB($row);
            },
            $this->query($sql, ['keyword1' => "%$keyword%", 'keyword2' => "%$keyword%", 'keyword3' => "%$keyword%"])
        );
    }
}
