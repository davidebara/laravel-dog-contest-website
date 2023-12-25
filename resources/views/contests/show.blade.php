@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">
        <p class="mb-0">Vizualizare Film</p>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('contests.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <strong>Name: </strong> {{ $contests->name }}
        </div>
        <div class="form-group">
            <strong>Date: </strong> {{ $contests->date }}
        </div>
        <div class="form-group">
            <strong>Prize: </strong> {{ $contests->prize }}
        </div>
        <div class="form-group">
            <strong>Bracket: </strong> {{ $contests->bracket_id }}
        </div>
    </div>
</div>
@endsection