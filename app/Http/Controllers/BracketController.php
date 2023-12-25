<?php

namespace App\Http\Controllers;

use App\Models\Bracket;
use Illuminate\Http\Request;

class BracketController extends Controller
{
    public function index()
    {
        $brackets = Bracket::orderBy('id', 'ASC')->paginate(5);
        return view('brackets.list', compact('brackets'))->with('i', 0)->with('paginationView', 'pagination');
    }
    

    public function create()
    {
        return view('brackets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Bracket::create($request->all());
        return redirect()->route('brackets.index')->with('success', 'Bracket added successfully!');
    }

    public function show($id)
    {
        $brackets = Bracket::find($id);
        return view('brackets.show', compact('brackets'));
    }

    public function edit($id)
    {
        $brackets = Bracket::find($id);
        return view('brackets.edit', compact('brackets'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Bracket::find($id)->update($request->all());
        return redirect()->route('brackets.index')->with('success', 'Bracket updated successfully');
    }

    public function destroy($id)
    {
        Bracket::find($id)->delete();
        return redirect()->route('brackets.index')->with('success', 'Bracket removed successfully');
    }
}
