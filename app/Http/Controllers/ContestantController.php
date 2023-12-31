<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Contest;

class ContestantController extends Controller
{
    # Vizualizarea tuturor speakerilor asociati
    public function index()
    {
        $dogs = Dog::orderBy('id', 'ASC')->paginate(5);
        return view('contestant.index', compact('dogs'))->with('i', 0)->with('paginationView', 'pagination');
    }
    # Crearea agendei (asocierea speakerilor cu evenimentele)
    public function create() 
    {
        $events = Contest::all();
        $dogs = Dog::all();
        
        return view('contestant.create', compact('events', 'dogs'));
    }
    public function store(Request $request)
    {
        $dogId = $request->get('dog_id');
        $eventId = $request->get('event_id');

        $dog = Dog::find($dogId);

        if ($dog) {
            $dog->contests()->attach($eventId, ['verification' => 1]);
        }

        return redirect()->route('contestant.index');
    }
    public function destroy($id)
    {
        $eventId = request()->input('event_id');
        $contest = Contest::find($eventId);

        if ($contest) {
            $dogId = $contest->dogs()->wherePivot('id', $id)->first()->id;
            $contest->dogs()->detach($dogId);
        }

        return redirect()->route('contestant.index')->with('success', 'Dog removed from contest successfully.');
    }
    public function toggleVerification($dogId, $contestId, $contestantPivotId)
    {
        $dog = Dog::find($dogId);
        $contest = Contest::find($contestId);

        if ($dog && $contest) {
            $pivotData = $dog->contests()->wherePivot('id', $contestantPivotId)->first()->pivot;
            if ($pivotData) {
                $pivotData->verification = $pivotData->verification == 1 ? 0 : 1;
                $pivotData->save();
            }
        }
        return redirect()->route('contestant.index')->with('success', 'Dog verification status updated successfully.');
    }
}
