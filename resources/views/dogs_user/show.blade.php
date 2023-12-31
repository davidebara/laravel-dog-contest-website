@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">
        <p class="mb-0">Vizualizare Film</p>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('dogs.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div style="float: left; margin-right: 20px;">
            <img src="{{ asset('images/' . $dogs->image) }}" class="card-img-top" alt="Film Poster"
                style="min-width:300px; max-width: 450px; height: auto;">
        </div>

        <div class="form-group">
            <strong>Name: </strong> {{ $dogs->name }}
        </div>
        <div class="form-group">
            <strong>Birth year: </strong> {{ $dogs->birth_year }}
        </div>
        <div class="form-group">
            <strong>Weight: </strong> {{ $dogs->weight }}
        </div>
        <div class="form-group">
            <strong>Description: </strong> {{ $dogs->description }}
        </div>
        <div class="form-group">
            <strong>Owner: </strong> {{ $dogs->owner_id }}
        </div>
        <div class="form-group">
            <strong>Verification: </strong> {{ $dogs->verification }}
        </div>
    </div>
</div>
@endsection