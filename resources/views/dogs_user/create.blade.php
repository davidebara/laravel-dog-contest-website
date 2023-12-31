@extends('layouts.app')

@section('content')
    <div class="card mx-4">
        <div class="card-header">{{ __('Add a new dog') }}</div>
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

            {{ Form::open(array('route' => 'dogs_user.store', 'method'=>'POST')) }}
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="birth_year" class="form-label">{{ __('Birth year') }}</label>
                    <input type="text" name="birth_year" class="form-control" value="{{ old('birth_year') }}">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">{{ __('Weight (kg)') }}</label>
                    <input type="number" name="weight" class="form-control" value="{{ old('weight') }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('Image') }}</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">{{ __('Owner') }}</label>
                    @if($owner)
                    <input type="text" name="owner_id" class="form-control" value="{{ $owner->id }}" readonly>
                    @else
                    <input type="text" name="owner_id" class="form-control" value="{{ Auth::id() }}" readonly>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-info">{{ __('Adauga Film') }}</button>
                <a href="{{ route('dogs_user.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection
