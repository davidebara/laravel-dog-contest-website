@extends('layouts.app')

@section('content')
<div class="card mx-4">
    <div class="card-header">
        <p class="mb-0">{{ __('Vizualizare Film') }}</p>
        <div class="float-end">
            <a class="btn btn-secondary" href="{{ route('contests.index') }}"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <strong>{{ __('Name') }}: </strong> {{ $contests->name }}
        </div>
        <div class="form-group">
            <strong>{{ __('Date') }}: </strong> {{ $contests->date }}
        </div>
        <div class="form-group">
            <strong>{{ __('Prize') }}: </strong> {{ $contests->prize }}
        </div>
        <div class="form-group">
            <strong>{{ __('Bracket') }}: </strong> {{ $contests->bracket_id }}
        </div>
    </div>
</div>
@endsection