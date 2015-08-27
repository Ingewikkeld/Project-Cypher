<?php

namespace App\Http\Controllers;

use App\People\PersonRepository;
use App\People\PersonId;
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


    public function dashboard($id)
    {
        $person = $this->personRepository->find(PersonId::fromString($id));

        return response()->json($person);
    }

    public function feDashboard($id){
        return view('template/front/pages/dashboard')->with('id', $id);
    }
}
