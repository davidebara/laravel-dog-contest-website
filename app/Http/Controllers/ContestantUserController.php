<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Contest;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class ContestantUserController extends Controller
{
    public function index()
    {
        $owner = Owner::where('userid', Auth::id())->first();
        $dogs = Dog::where('owner_id', $owner->id)->orderBy('id', 'ASC')->paginate(5);
        return view('contestant.index', compact('dogs'))->with('i', 0)->with('paginationView', 'pagination');
    }

    public function create() 
    {
        $events = Contest::all();
        $owner = Owner::where('userid', Auth::id())->first();
        $dogs = Dog::where('owner_id', $owner->id)->get();
        
        return view('contestant.create', compact('events', 'dogs'));
    }

    public function store(Request $request)
    {
        $dogId = $request->get('dog_id');
        $eventId = $request->get('event_id');

        $owner = Owner::where('userid', Auth::id())->first();
        $dog = Dog::where('id', $dogId)->where('owner_id', $owner->id)->first();

        if ($dog) {
            $dog->contests()->attach($eventId, ['verification' => 0]);
        }

        return redirect()->route('contestant.index');
    }

    public function destroy($id)
    {
        $eventId = request()->input('event_id');
        $contest = Contest::find($eventId);

        if ($contest) {
            $owner = Owner::where('userid', Auth::id())->first();
            $dogId = $contest->dogs()->wherePivot('id', $id)->where('owner_id', $owner->id)->first()->id;
            $contest->dogs()->detach($dogId);
        }

        return redirect()->route('contestant.index')->with('success', 'Dog removed from contest successfully.');
    }
   
}
