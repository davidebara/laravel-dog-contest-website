<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class DogUserController extends Controller
{
    public function index()
    {
        $owner = Owner::where('userid', Auth::id())->first();
        $dogs = Dog::where('owner_id', $owner->id)->orderBy('id', 'ASC')->paginate(5);
        return view('dogs_user.list', compact('dogs'))->with('i', 0)->with('paginationView', 'pagination');
    }

    public function create()
    {
        $owner = Owner::where('userid', Auth::id())->first();
        return view('dogs_user.create', compact('owner'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_year' => 'required',
        ]);

        $owner = Owner::where('userid', Auth::id())->first();
        $request->merge(['owner_id' => $owner->id]);
        Dog::create($request->all());

        return redirect()->route('dogs_user.index')->with('success', 'Dog added successfully!');
    }

    public function show($id)
    {
        $owner = Owner::where('userid', Auth::id())->first();
        $dog = Dog::where('id', $id)->where('owner_id', $owner->id)->first();

        if (!$dog) {
            return redirect()->route('dogs_user.index')->with('error', 'Dog not found');
        }

        return view('dogs_user.show', compact('dog'));
    }

    public function edit($id)
    {
        $owner = Owner::where('userid', Auth::id())->first();
        $dog = Dog::where('id', $id)->where('owner_id', $owner->id)->first();

        if (!$dog) {
            return redirect()->route('dogs_user.index')->with('error', 'Dog not found');
        }

        return view('dogs_user.edit', compact('dog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_year' => 'required',
        ]);

        $owner = Owner::where('userid', Auth::id())->first();
        $dog = Dog::where('id', $id)->where('owner_id', $owner->id)->first();

        if (!$dog) {
            return redirect()->route('dogs_user.index')->with('error', 'Dog not found');
        }

        $dog->update($request->all());

        return redirect()->route('dogs_user.index')->with('success', 'Dog updated successfully');
    }

    public function destroy($id)
    {
        $owner = Owner::where('userid', Auth::id())->first();
        $dog = Dog::where('id', $id)->where('owner_id', $owner->id)->first();

        if (!$dog) {
            return redirect()->route('dogs_user.index')->with('error', 'Dog not found');
        }

        $dog->delete();

        return redirect()->route('dogs_user.index')->with('success', 'Dog removed successfully');
    }
}