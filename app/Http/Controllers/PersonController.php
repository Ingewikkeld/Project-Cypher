<?php

namespace App\Http\Controllers;

use App\People\Data;
use App\People\DataType;
use App\People\Person;
use App\People\PersonId;
use App\People\PersonRepository;

class PersonController extends Controller
{
    /**
     * @var PersonRepository
     */
    private $personRepository;

    /**
     * @param PersonRepository $personRepository
     */
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function test()
    {
//        FIND
//
//        $personId = PersonId::fromString('636e9d49-57f0-40b1-9f72-e6ade301e2a0');
//        $person   = $this->personRepository->find($personId);
//
//        var_dump($person);
//        var_dump(json_encode($person));

//        ADD
//
//        $person = new Person(
//            PersonId::generate(),
//            'Ramon de la Fuente',
//            [
//                new Data(DataType::CUSTOM(), 'birthday', '19-07-1977'),
//                new Data(DataType::CUSTOM(), 'gender', 'male')
//            ]
//        );
//
//        $this->personRepository->add($person);

//        UPDATE
//
//        $personId = PersonId::fromString('74559889-e844-43e8-b9ce-566c0b237143');
//        $person   = $this->personRepository->find($personId);
//
//        foreach ($person->getData() as $data);
//
//        $person->rename('Ramon Test');
//        $person->removeData($data);
//        $person->addData(new Data(DataType::CUSTOM(), 'gender', 'female'));
//
//        $this->personRepository->update($person);
    }
}
