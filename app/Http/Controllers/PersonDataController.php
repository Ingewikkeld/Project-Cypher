<?php

namespace App\Http\Controllers;

use App\People\DataType;
use App\People\PersonId;
use App\People\PersonRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PersonDataController extends Controller
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
     * Adds one or many data entries for person with given $id
     * Expects JSON data with below structure
     *
     * [
     * {"type": "custom", "label": "a label nr 1", "value": "a value1"},
     * {"type": "custom", "label": "a label nr 2", "value": "a value2"},
     * {"type": "custom", "label": "a label nr 3", "value": "a value3"}
     * ]
     *
     * @param $id
     */
    public function apiPostAction($id)
    {
        $person = $this->personRepository->find(PersonId::fromString($id));

        if (!$person) {
            abort(404);
        }

        $newData = Input::get();

        foreach ($newData as $dataRow) {
            $person->addData(DataType::fromString($dataRow['type']), $dataRow['label'], $dataRow['value']);
        }

        $this->personRepository->update($person);

        return response()->json($person);
    }
}