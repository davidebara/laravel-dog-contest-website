@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success mx-4">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card mx-4">
    <div class="card-header">
        Contestant 
        <p class="text-info mb-0">ADMIN</p>
        <div class="float-end mt-0">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Inapoi
            </a>
            <a href="{{ route('contestant.create') }}" class="btn btn-info">Add new contestant</a>
        </div>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nume</th>
                    <th>Event</th>
                    <th>Verified</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dogs as $dog)
                    @foreach ($dog->contests as $event)
                        <tr>
                            <td>{{ $dog->name}}</td>
                            <td>{{ $event->name}}</td>
                            <td>
                                {{ $event->pivot->verification == 1 ? '✅' : '❌' }}
                            </td>
                            @can('access-crud-page')
                            <td>
                                <a href="{{ route('contestant.toggleVerification', ['dogId' => $dog->id, 'contestId' => $event->id, 'contestantPivotId' => $event->pivot->id]) }}" class="btn btn-primary">Toggle Verification</a>
                            </td>
                            @endcan
                            <td>
                            <form action="{{ route('contestant.destroy', $event->pivot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="event_id" value='{{ $event->id }}' method="POST">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
       
        <div class="d-flex justify-content-center">
            {{ $dogs->links($paginationView) }}
        </div>
    </div>
</div>
@endsection