<?php

namespace App\Http\Controllers;

use App\People\PersonRepository;
use App\People\PersonId;

class PeoplesController extends Controller
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


    public function apiGetAction()
    {
        return json_encode($this->personRepository->findAll());
    }


    public function dashboard($id)
    {
        $person = $this->personRepository->find(PersonId::fromString($id));

        return response()->json($person);
    }
}
