<?php

namespace App\Http\Controllers;

use App\People\PersonId;
use App\People\PersonRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    /**
     * @param Request $request
     * @return Response
     */
    public function apiGetAction(Request $request)
    {
        if ($request->query->has('keyword')) {
            $keyword = $request->query->get('keyword');
            $peoples = $this->personRepository->search($keyword);
        } else {
            $peoples = $this->personRepository->findAll();
        }

        return response()->json($peoples);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function dashboard($id)
    {
        $person = $this->personRepository->find(PersonId::fromString($id));

        return response()->json($person);
    }
}
