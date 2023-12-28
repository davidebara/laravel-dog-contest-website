@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mt-2">Dashboard</h1>
    <hr>
    <br>
    
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Films</h5>
                    <p class="card-text">Manage Films</p>
                    <a href="{{ route('films.index') }}" class="btn btn-info">Go to Films</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Screenings</h5>
                    <p class="card-text">Manage Screenings</p>
                    <a href="{{ route('screenings.index') }}" class="btn btn-info">Go to Screenings</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Actors</h5>
                    <p class="card-text">Manage Actors</p>
                    <a href="{{ route('actors.index') }}" class="btn btn-info">Go to Actors</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Locations</h5>
                    <p class="card-text">Manage Locations</p>
                    <a href="{{ route('locations.index') }}" class="btn btn-info">Go to Locations</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage Users</p>
                    <a href="{{ route('users.index') }}" class="btn btn-info">Go to Users</a>
                </div>
            </div>
        </div>
        
        <!-- <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Reservations</h5>
                    <p class="card-text">Manage Reservations</p>
                    <a href="" class="btn btn-info">Go to Reservations</a>
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection
