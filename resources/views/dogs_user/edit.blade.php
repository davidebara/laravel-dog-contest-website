@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">{{ __('Edit dog') }}</div>
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

        {!! Form::model($dogs, ['method' => 'PATCH', 'route' => ['dogs_user.update', $dogs->id]]) !!}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ $dogs->name }}">
        </div>
        <div class="mb-3">
            <label for="birth_year" class="form-label">{{ __('Birth year') }}</label>
            <input type="text" name="birth_year" class="form-control" value="{{ $dogs->birth_year }}">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">{{ __('Weight (kg)') }}</label>
            <input type="number" name="weight" class="form-control" value="{{ $dogs->weight }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">{{ __('Image') }}</label>
            <textarea type="text" name="image" class="form-control">{{ $dogs->image }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <textarea type="text" name="description" class="form-control">{{ $dogs->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="owner_id" class="form-label">{{ __('Owner') }}</label>
            <textarea type="text" name="owner_id" class="form-control">{{ $dogs->owner_id }}</textarea>
        </div>
        <div class="mb-3">
            <label for="verification" class="form-label">{{ __('Verification') }}</label>
            <textarea type="number" name="verification" class="form-control">{{ $dogs->verification }}</textarea>
        </div>
        <button type="submit" class="btn btn-info">{{ __('Save') }}</button>
        <a href="{{ route('dogs_user.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection