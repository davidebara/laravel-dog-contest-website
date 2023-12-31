@extends('layouts.app')

@section('content')
<div class="container">
    @if($owner)
        <h2>Owner Profile</h2>
        <p>First Name: {{ $owner->first_name }}</p>
        <p>Last Name: {{ $owner->last_name }}</p>
        <p>Country: {{ $owner->country }}</p>
        <a href="{{ route('owner-profile.edit', $owner->id) }}" class="btn btn-primary">Edit Profile</a>
    @else
        <h2>No Owner Profile Found</h2>
        <a href="{{ route('owner-profile.create') }}" class="btn btn-primary">Create Profile</a>
    @endif
</div>
@endsection