@extends('layouts.app')

@section('content')
    <div class="card mx-4">
        <div class="card-header">{{ __('Add a new bracket') }}</div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>{{ __('Errors') }}:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(array('route' => 'brackets.store', 'method'=>'POST')) }}
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="lower_limit" class="form-label">{{ __('Lower limit (kg)') }}</label>
                    <input type="number" name="lower_limit" class="form-control" value="{{ old('lower_limit') }}">
                </div>
                <div class="mb-3">
                    <label for="upper_limit" class="form-label">{{ __('Upper limit (kg)') }}</label>
                    <input type="number" name="upper_limit" class="form-control" value="{{ old('upper_limit') }}">
                </div>
                
                <button type="submit" class="btn btn-info">{{ __('Adauga Film') }}</button>
                <a href="{{ route('brackets.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection
