@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Dog Participant</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contestant.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="dog_id">Dog</label>
                            <select class="form-control" id="dog_id" name="dog_id">
                                @foreach ($dogs as $dog)
                                    <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="event_id">Event</label>
                            <select class="form-control" id="event_id" name="event_id">
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Dog Participant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection