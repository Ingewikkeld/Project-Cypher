<?php

namespace App\Http\Controllers;

use App\People\Person;
use App\People\PersonId;
use App\People\PersonRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddPersonController extends Controller
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
    public function postAction(Request $request)
    {
        $person = new Person(
            PersonId::generate(),
            $request->request->get('name')
        );

        $this->personRepository->add($person);

        return response()->json($person);
    }

    /**
     * @return View
     */
    public function getAction()
    {
        return view('template/front/pages/add-person');
    }
}
