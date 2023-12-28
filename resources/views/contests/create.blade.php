@extends('layouts.app')

@section('content')
    <div class="card mx-4">
        <div class="card-header">Add a new contest</div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'contests.store', 'method'=>'POST')) }}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                </div>
                <div class="mb-3">
                    <label for="prize" class="form-label">Prize</label>
                    <input type="number" name="prize" class="form-control" value="{{ old('prize') }}">
                </div>
                <div class="mb-3">
                    <label for="bracket_id" class="form-label">Bracket</label>
                    {!! Form::select('bracket_id', $brackets, old('bracket_id'), ['class' => 'form-control']) !!}
                </div>
                
                <button type="submit" class="btn btn-info">Add Contest</button>
                <a href="{{ route('contests.index') }}" class="btn btn-outline-secondary">Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection
