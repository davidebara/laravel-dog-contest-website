<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Contest;

class DogContestController extends Controller
{
    # Vizualizarea tuturor speakerilor asociati
    public function index()
    {
        $dogs = Dog::orderBy('id', 'ASC')->paginate(5)->where('verification', '=', 0);
        return view('dogcontest.index', compact('dogs'))->with('i', 0)->with('paginationView', 'pagination');
    }
    # Crearea agendei (asocierea speakerilor cu evenimentele)
    // public function create() 
    // {
    //     $userId = Auth::guard('organizatori')->id();
    //     $events = Eveniment::where('organizator_id', $userId)->get();
    //     $speakers = Speaker::where('created_by', $userId)->get();
        
    //     return view('organizator.speakers.create_agenda', compact('events', 'speakers'));
    // }
    // # Asocierea speakerilor cu evenimentele
    // public function store(Request $request)
    // {
    //     $speakerId = $request->get('speaker_id');
    //     $eventId = $request->get('event_id');
    //     $descriere= $request->get('descriere');
    //     $startTime = $request->get('start_time');
    //     $endTime = $request->get('end_time');

    //     $speaker = Speaker::find($speakerId);

    //     if ($speaker) {
    //         $speaker->evenimente()->attach($eventId, ['start_time' => $startTime, 'end_time' => $endTime, 'descriere' => $descriere]);
    //     }

    //     return redirect()->route('admin.agenda.index');
    // }
    // # Afisarea formularului de editare a agendei
    // public function edit($id)
    // {
    //     $userId = Auth::guard('organizatori')->id();
    //     $events = Eveniment::where('organizator_id', $userId)->get();

    //     $speaker = Speaker::where('created_by', $userId)->whereHas('evenimente', function ($query) use ($id) {
    //         $query->where('event_speaker.id', $id);
    //     })->first();
        
    //     $descriere = $speaker->evenimente()->wherePivot('id', $id)->first()->pivot->descriere;


    //     if (!$speaker) {
    //         return redirect()->route('admin.agenda.index');
    //     }

    //     return view('organizator.speakers.edit_agenda', compact('events', 'speaker', 'descriere'));
    // }
    // # Actualizarea agendei in baza de date
    // public function update(Request $request, $id)
    // {
    //     $speakerId = $request->get('speaker_id');
    //     $eventId = $request->get('event_id');
    //     $descriere= $request->get('descriere');
    //     $startTime = $request->get('start_time');
    //     $endTime = $request->get('end_time');

    //     $speaker = Speaker::find($speakerId);

    //     if ($speaker) {
    //         $speaker->evenimente()->sync([$eventId => ['start_time' => $startTime, 'end_time' => $endTime, 'descriere' => $descriere]]);
    //     }

    //     return redirect()->route('admin.agenda.index');
    // }
    // # Stergerea unei intrari din tabelul pivot event_speaker
    // public function destroy($id)
    // {
    //     $eventId = request()->input('event_id');
    //     Eveniment::find($eventId)->speakeri()->wherePivot('id','=',$id)->detach();

    //     return redirect()->route('admin.agenda.index')->with('success', 'Agenda deleted successfully.');
    // }
}
