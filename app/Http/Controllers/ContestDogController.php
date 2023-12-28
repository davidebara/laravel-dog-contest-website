<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Contest;

class ContestDogController extends Controller
{
    public function joinContest(Request $request)
    {
        $dogId = $request->input('dog_id');
        $contestId = $request->input('contest_id');

        $dog = Dog::find($dogId);
        $contest = Contest::find($contestId);

        // Attach the dog to the contest
        $dog->contests()->attach($contest);

        // Redirect with a success message
        return redirect()->route('contests.index')->with('success', 'Dog successfully joined the contest!');
    }
}
