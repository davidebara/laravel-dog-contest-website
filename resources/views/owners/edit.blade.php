@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Owner</h2>
    <form action="{{ route('owner-profile.update', $owner->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">{{ __('First Name') }}</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $owner->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">{{ __('Last Name') }}</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $owner->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="country">{{ __('Country') }}</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ $owner->country }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</div>
@endsection