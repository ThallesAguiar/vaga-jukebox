<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    /**
     * @var Person
     */
    private $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function index(){

        $people = $this->person->all();

        return response()->json($people);
    }

    public function show($id){

        $person = $this->person->find($id);

        return response()->json($person);
    }

    public function store(Request $request){
        
        $person = $this->person->create($request->all());

        return response()->json($person);
    }

    public function update(Request $request){
        
        $data = $request->all();
        $person = $this->person->find($data['id']);
        $person->update($data);

        return response()->json($person);
    }

    public function delete($id){
        
        $person = $this->person->find($id);
        $person->delete();

        return response()->json(['msg'=>"Person deleted with success!"]);
    }

    
}
