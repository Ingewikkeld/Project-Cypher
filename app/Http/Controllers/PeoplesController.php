<?php

namespace App\Http\Controllers;

use App\People\PersonRepository;

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
}
