@extends('layouts.app')

@section('content')
    <div class="card mx-4">
        <div class="card-header">Add a new dog</div>
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

            {{ Form::open(array('route' => 'dogs.store', 'method'=>'POST')) }}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="birth_year" class="form-label">Birth year</label>
                    <input type="text" name="birth_year" class="form-control" value="{{ old('birth_year') }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">Owner</label>
                    <input type="text" name="owner_id" class="form-control" value="{{ old('owner_id') }}">
                </div>
                
                <button type="submit" class="btn btn-info">Adauga Film</button>
                <a href="{{ route('dogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection
