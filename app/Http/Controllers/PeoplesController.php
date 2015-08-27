<?php

namespace App\Http\Controllers;

use App\People\PersonRepository;
use Illuminate\Http\Request;

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

    public function apiGetAction(Request $request)
    {
        if ($request->query->has('keyword')) {
            $keyword = $request->query->get('keyword');
            $peoples = $this->personRepository->search($keyword);
        } else {
            $peoples = $this->personRepository->findAll();
        }

        return json_encode($peoples);
    }
}
