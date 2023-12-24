<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::orderBy('id', 'ASC')->paginate(5);
        return view('dogs.list', compact('dogs'))->with('i', 0)->with('paginationView', 'pagination');
    }
    

    public function create()
    {
        return view('dogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_year' => 'required',
        ]);

        Dog::create($request->all());
        return redirect()->route('dogs.index')->with('success', 'Dog added successfully!');
    }

    public function show($id)
    {
        $dogs = Dog::find($id);
        return view('dogs.show', compact('dogs'));
    }

    public function edit($id)
    {
        $dogs = Dog::find($id);
        return view('dogs.edit', compact('dogs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_year' => 'required',
        ]);

        Dog::find($id)->update($request->all());
        return redirect()->route('dogs.index')->with('success', 'Dog updated successfully');
    }

    public function destroy($id)
    {
        Dog::find($id)->delete();
        return redirect()->route('dogs.index')->with('success', 'Dog removed successfully');
    }
}
