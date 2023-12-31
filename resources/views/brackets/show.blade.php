@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">
        <p class="mb-0">{{ __('Vizualizare Film') }}</p>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('brackets.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <strong>Name: </strong> {{ $brackets->name }}
        </div>
        <div class="form-group">
            <strong>Lower limit: </strong> {{ $brackets->lower_limit }}
        </div>
        <div class="form-group">
            <strong>Upper limit: </strong> {{ $brackets->upper_limit }}
        </div>
    </div>
</div>
@endsection