@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">Edit bracket</div>
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

        {!! Form::model($bracket, ['method' => 'PATCH', 'route' => ['brackets.update', $bracket->id]]) !!}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $bracket->name }}">
        </div>
        <div class="mb-3">
            <label for="lower_limit" class="form-label">Lower limit (kg)</label>
            <input type="number" name="lower_limit" class="form-control" value="{{ $bracket->lower_limit }}">
        </div>
        <div class="mb-3">
            <label for="upper_limit" class="form-label">Upper limit (kg)</label>
            <input type="number" name="upper_limit" class="form-control" value="{{ $bracket->upper_limit }}">
        </div>

        <button type="submit" class="btn btn-info">Save</button>
        <a href="{{ route('brackets.index') }}" class="btn btn-outline-secondary">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection