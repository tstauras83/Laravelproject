<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Rules\PersonalCodeRule;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
{
    $persons =  Person::query()->with(['user'])->get();

    return view('persons.index', compact('persons'));
}

    public function create(Person $person)
    {
        return view('persons.create', ['person' => $person]);
    }

    public function store(PersonRequest $request)
    {
        $person = Person::create($request->all());
        return redirect()->route('persons.index', $person);
    }

    public function show(Person $person)
    {
        return view('persons.show', ['person' => $person]);

    }

    public function edit(Person $person)
    {
        return view('persons.edit', compact('person'));
    }

    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('persons.show', $person);
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('persons.index');
    }
}
