<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $users = Person::all();
        return view('index', ['users' => $users]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email',
            'age' => 'required|numeric'
        ]);

        $newUser = Person::create($data);

        return redirect(route('index'));
    }

    public function edit(Person $user)
    {
        return view('edit', ['user' => $user]);
    }

    public function update(Person $user, Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email',
            'age' => 'required|numeric'
        ]);

        $user->update($data);

        return redirect(route('person.index'))->with('success', 'Update Succesful');
    }

    public function delete(Person $user)
    {
        $user->delete();
        return redirect(route('person.index'))->with('success', 'Deleted Succesfully');
    }
}
