<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;

class ContestController extends Controller
{
    public function index()
    {
        $contests = Contest::orderBy('id', 'ASC')->paginate(5);
        return view('contests.list', compact('contests'))->with('i', 0)->with('paginationView', 'pagination');
    }
    

    public function create()
    {
        return view('contests.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Contest::create($request->all());
        return redirect()->route('contests.index')->with('success', 'Contest added successfully!');
    }

    public function show($id)
    {
        $contests = Contest::find($id);
        return view('contests.show', compact('contests'));
    }

    public function edit($id)
    {
        $contests = Contest::find($id);
        return view('contests.edit', compact('contests'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Contest::find($id)->update($request->all());
        return redirect()->route('contests.index')->with('success', 'Contest updated successfully');
    }

    public function destroy($id)
    {
        Contest::find($id)->delete();
        return redirect()->route('contests.index')->with('success', 'Contest removed successfully');
    }
}
