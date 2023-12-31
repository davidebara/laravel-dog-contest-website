@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">Edit contest</div>
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

        {!! Form::model($contest, ['method' => 'PATCH', 'route' => ['contests.update', $contest->id]]) !!}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name')}}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $contest->name) }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">{{ __('Date')}}</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $contest->date) }}">
        </div>
        <div class="mb-3">
            <label for="prize" class="form-label">{{ __('Prize')}}</label>
            <input type="number" name="prize" class="form-control" value="{{ old('prize', $contest->prize) }}">
        </div>
        <div class="mb-3">
            <label for="bracket_id" class="form-label">{{ __('Bracket')}}</label>
            {!! Form::select('bracket_id', $brackets, old('bracket_id'), ['class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-info">{{ __('Save')}}</button>
        <a href="{{ route('contests.index') }}" class="btn btn-outline-secondary">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection