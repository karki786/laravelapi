<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;

class PersonController extends Controller
{
    
    public function show( Person $person){
        // dd($person);
         return  new PersonResource($person);
    }
    public function index(){
        return new PersonResourceCollection( Person::paginate());
    }
    public function store( Request $request){

        $request->validate([
          'first_name'=>'required',
          'last_name'=>'required',
          'phone'=>'required',
          'email'=>'required',
          'city'=>'required',
        ]);
        $person=Person::create($request->all());
        return new PersonResource($person);
    }
    public function update(Person $person, Request $request){
        
          $person->update($request->all());
        return new PersonResource($person);
    }
    public function destroy(Person $person){
        $person->delete();
        return response()->json();
    }
}
